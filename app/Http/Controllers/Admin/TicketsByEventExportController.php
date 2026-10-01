<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TicketsByEventExport;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TicketsByEventExportController extends Controller
{
    /**
     * Export filtered tickets-by-event to Excel.
     */
    public function __invoke(Request $request): BinaryFileResponse
    {
        $eventId = $request->query('event_id');
        $paymentStatus = $request->query('payment_status', '');
        $status = $request->query('status', '');

        if (blank($eventId)) {
            abort(422, 'Event is required.');
        }

        $query = OrderItem::with(['event', 'order', 'attendee', 'ticket', 'scannedByUser'])
            ->where('event_id', $eventId)
            ->orderBy('ticket_code');

        if ($paymentStatus === 'paid') {
            $query->whereHas('order', fn ($q) => $q->where('status', Order::STATUS_PAID));
        } elseif ($paymentStatus === 'unpaid') {
            $query->whereHas('order', fn ($q) => $q->where('status', '!=', Order::STATUS_PAID));
        }

        if ($status === 'scanned') {
            $query->where('is_scanned', true);
        } elseif ($status === 'pending') {
            $query->where('is_scanned', false);
        }

        $items = $query->get();

        $event = Event::find($eventId);
        $eventSlug = $event ? Str::slug($event->name) : (string) $eventId;
        $filename = 'tickets-' . $eventSlug . '-' . now()->format('Y-m-d-His') . '.xlsx';

        return Excel::download(new TicketsByEventExport($items), $filename);
    }
}
