@php
    $order = isset($order) ? $order : (isset($getRecord) && is_callable($getRecord) ? $getRecord() : null);
@endphp
@if ($order)
    <div class="space-y-4">
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <span class="font-semibold ">Transaction Code</span>
                <p class="text-gray-900">{{ $order->transaction_code }}</p>
            </div>
            <div>
                <span class="font-semibold ">Customer</span>
                <p class="text-gray-900">{{ $order->user?->name }}</p>
            </div>
            <div>
                <span class="font-semibold ">Total</span>
                <p class="text-gray-900">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
            </div>
            <div>
                <span class="font-semibold ">Status</span>
                <p class="text-gray-900">{{ $order->status }}</p>
            </div>
        </div>
        @if ($order->payment_proof_path)
            <div>
                <span class="font-semibold block mb-2">Bukti Pembayaran</span>
                <a href="{{ Storage::disk('public')->url($order->payment_proof_path) }}" target="_blank" rel="noopener" class="inline-block">
                    <img src="{{ Storage::disk('public')->url($order->payment_proof_path) }}" alt="Payment proof" class="max-w-md rounded-lg border shadow-sm hover:opacity-90 transition-opacity">
                </a>
            </div>
        @else
            <p class="text-gray-500 text-sm">Belum ada bukti pembayaran.</p>
        @endif
    </div>
@else
    <p class="text-gray-500 text-sm">—</p>
@endif
