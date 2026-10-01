<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with(['items.event', 'items.ticket'])
            ->latest()
            ->get();

        return view('pages.myorder.myorder', [
            'orders' => $orders,
        ]);
    }
}
