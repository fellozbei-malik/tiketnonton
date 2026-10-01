<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PriceComponent;
use App\Services\PaymentProofImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart');
        if (empty($cart)) {
            return redirect('/');
        }
        $event = Event::find($cart['event_id']);

        $individualTickets = [];
        $subtotal = 0;
        foreach ($cart['tickets'] as $item) {
            $subtotal += $item['selected_quantity'] * $item['price'];
            for ($i = 0; $i < $item['selected_quantity']; $i++) {
                $individualTickets[] = [
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'ticket_id' => $item['id'],
                ];
            }
        }

        $priceComponentsWithAmounts = PriceComponent::activeOrdered()->get()->map(function (PriceComponent $component) use ($subtotal) {
            return [
                'name' => $component->name,
                'amount' => $component->calculateAmount($subtotal),
            ];
        })->all();
        $componentsTotal = array_sum(array_column($priceComponentsWithAmounts, 'amount'));
        $total = $subtotal + $componentsTotal;

        return view('pages.checkout.payment', [
            'cart' => $cart,
            'event' => $event,
            'individualTickets' => $individualTickets,
            'subtotal' => $subtotal,
            'priceComponentsWithAmounts' => $priceComponentsWithAmounts,
            'total' => $total,
        ]);
    }

    public function store(Request $request)
    {
        $cartData = json_decode($request->input('cart_data'), true);

        if (empty($cartData)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $processedCart = [
            'event_id' => $request->input('event_id'),
            'tickets' => $cartData,
        ];

        session(['cart' => $processedCart]);

        return redirect()->route('checkout.index');
    }

    public function pay(Request $request)
    {
        $cart = session('cart');
        if (empty($cart)) {
            return redirect('/');
        }

        $rules = [
            'attendees' => 'required|array',
            'attendees.*.first_name' => 'required|string|max:255',
            'attendees.*.last_name' => 'required|string|max:255',
            'attendees.*.email' => 'required|email:dns|max:255',
            'attendees.*.phone' => 'required|string|max:20',
            'attendees.*.birthdate' => ['required', 'date', Rule::date()->beforeOrEqual(today())],
            'attendees.*.identity_number' => 'required|string|min:16|max:16',
            'attendees.*.ticket_id' => 'required|integer|exists:tickets,id',
        ];

        $messages = [
            'attendees.*.identity_number.min' => 'The ID number / Passport must be 16 characters.',
            'attendees.*.identity_number.max' => 'The ID number / Passport must be 16 characters.',
            'attendees.*.email.required' => 'The email field is required.',
            'attendees.*.email.email' => 'Please enter a valid email address.',
            'attendees.*.first_name.required' => 'Please enter the first name.',
            'attendees.*.birthdate.before_or_equal' => 'The birthdate cannot be in the future.',
        ];

        $validated = $request->validate($rules, $messages);

        $subtotal = array_reduce($cart['tickets'], fn ($carry, $item) => $carry + ($item['selected_quantity'] * $item['price']), 0);
        $componentsTotal = 0;
        foreach (PriceComponent::activeOrdered()->get() as $component) {
            $componentsTotal += $component->calculateAmount($subtotal);
        }
        $totalAmount = $subtotal + $componentsTotal;

        $event = Event::findOrFail($cart['event_id']);
        $eventSlug = Str::slug($event->name);

        $order = null;
        DB::transaction(function () use ($validated, $totalAmount, $cart, $eventSlug, &$order) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'transaction_code' => 'TRX-' . $eventSlug . '-' . time() . '-' . Str::upper(Str::random(5)),
                'total_amount' => $totalAmount,
                'status' => Order::STATUS_PENDING,
            ]);

            foreach ($validated['attendees'] as $attendeeData) {
                $attendee = Attendee::create([
                    'first_name' => $attendeeData['first_name'],
                    'last_name' => $attendeeData['last_name'],
                    'birthdate' => $attendeeData['birthdate'],
                    'email' => $attendeeData['email'],
                    'phone_number' => $attendeeData['phone'],
                    'identity_number' => $attendeeData['identity_number'],
                ]);

                OrderItem::create([
                    'order_id' => $order->id,
                    'event_id' => $cart['event_id'],
                    'user_id' => Auth::id(),
                    'ticket_id' => $attendeeData['ticket_id'],
                    'attendee_id' => $attendee->id,
                    'ticket_code' => 'TICKET-' . $eventSlug . '-' . time() . '-' . Str::upper(Str::random(5)),
                    'price' => \App\Models\Ticket::find($attendeeData['ticket_id'])->price,
                ]);
            }
        });

        session()->forget('cart');

        return redirect()->route('checkout.pay.show', $order);
    }

    public function showPay(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if (! in_array($order->status, [Order::STATUS_PENDING, Order::STATUS_PENDING_VERIFICATION], true)) {
            return redirect()->route('myticket')->with('info', __('checkout.already_processed'));
        }

        $order->load('items.event', 'items.ticket');

        return view('pages.checkout.pay', [
            'order' => $order,
        ]);
    }

    public function uploadPaymentProof(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== Order::STATUS_PENDING) {
            return redirect()->route('checkout.pay.show', $order)
                ->with('error', __('checkout.cannot_upload'));
        }

        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,jpg,png|max:5120',
        ], [
            'payment_proof.required' => __('checkout.proof_required'),
            'payment_proof.image' => __('checkout.proof_must_image'),
            'payment_proof.mimes' => __('checkout.proof_mimes'),
            'payment_proof.max' => __('checkout.proof_max'),
        ]);

        $path = app(PaymentProofImageService::class)->storeAndOptimize($request->file('payment_proof'));

        $order->update([
            'payment_proof_path' => $path,
            'status' => Order::STATUS_PENDING_VERIFICATION,
        ]);

        return redirect()->route('myticket')->with('message', __('checkout.verification_message'));
    }

    public function paymentSuccess(Order $order)
    {
        $order->load('items.ticket');
        $ticketSummary = $order->items->groupBy('ticket.name')
            ->map(fn ($group) => $group->count());

        return view('pages.checkout.payment-success', [
            'order' => $order,
            'ticketSummary' => $ticketSummary,
        ]);
    }

    public function paymentFailed()
    {
        return view('pages.checkout.payment-failed');
    }
}
