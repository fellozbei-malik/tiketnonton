@extends('layouts.app')

@section('content')
<div class="bg-white">
    <x-navbarBlack />

    <div class="pt-28">
        @if (session('message'))
            <div class="container mx-auto px-4 mb-4">
                <div class="max-w-5xl mx-auto rounded-xl bg-green-50 border border-green-200 text-green-800 px-4 py-3 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('message') }}</span>
                </div>
            </div>
        @endif
        @if (session('info'))
            <div class="container mx-auto px-4 mb-4">
                <div class="max-w-5xl mx-auto rounded-xl bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('info') }}</span>
                </div>
            </div>
        @endif

        <section class="bg-gradient-to-b from-slate-50 to-slate-100 py-12 md:py-20">
            <div class="container mx-auto px-4">
                <div class="max-w-5xl mx-auto mb-12">
                    <div class="text-center">
                        <!-- <div class="inline-block px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 rounded-full mb-4">
                            <span class="text-purple-700 font-semibold text-sm">{{ __('myorder.subtitle') }}</span>
                        </div> -->
                        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4">
                            {{ __('myorder.title') }}
                        </h1>
                        <p class="text-slate-600 text-lg">
                            {{ __('myorder.subtitle') }}
                        </p>
                    </div>
                </div>

                <div class="max-w-5xl mx-auto space-y-6">
                    @forelse ($orders as $order)
                    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="p-6 md:p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                            <div class="flex-1">
                                <div class="flex flex-wrap items-center gap-3 mb-2">
                                    <span class="text-slate-500 text-sm font-semibold">{{ __('myorder.transaction_code') }}</span>
                                    <span class="font-mono font-bold text-slate-900">{{ $order->transaction_code }}</span>
                                </div>
                                @if ($order->items->isNotEmpty() && $order->items->first()->event)
                                    <p class="text-lg font-bold text-slate-900 mb-1">{{ $order->items->first()->event->name }}</p>
                                    <p class="text-sm text-slate-600">{{ $order->items->count() }} tiket</p>
                                @endif
                                <p class="mt-2 text-slate-700">
                                    {{ __('myorder.total') }}:
                                    <span class="font-bold text-lg">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                </p>
                                <p class="text-sm text-slate-500 mt-1">{{ $order->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                                @php
                                    $statusLabel = match ($order->status) {
                                        \App\Models\Order::STATUS_PAID => __('myorder.status_paid'),
                                        \App\Models\Order::STATUS_PENDING => __('myorder.status_pending'),
                                        \App\Models\Order::STATUS_PENDING_VERIFICATION => __('myorder.status_pending_verification'),
                                        \App\Models\Order::STATUS_REJECTED => __('myorder.status_rejected'),
                                        default => $order->status,
                                    };
                                    $statusColor = match ($order->status) {
                                        \App\Models\Order::STATUS_PAID => 'bg-green-100 text-green-800',
                                        \App\Models\Order::STATUS_PENDING => 'bg-amber-100 text-amber-800',
                                        \App\Models\Order::STATUS_PENDING_VERIFICATION => 'bg-blue-100 text-blue-800',
                                        \App\Models\Order::STATUS_REJECTED => 'bg-red-100 text-red-800',
                                        default => 'bg-slate-100 text-slate-800',
                                    };
                                @endphp
                                <span class="px-3 py-1.5 rounded-full text-sm font-semibold {{ $statusColor }}">{{ $statusLabel }}</span>
                                @if (in_array($order->status, [\App\Models\Order::STATUS_PENDING, \App\Models\Order::STATUS_PENDING_VERIFICATION], true))
                                    @if ($order->status === \App\Models\Order::STATUS_PENDING && !$order->payment_proof_path)
                                        <a href="{{ route('checkout.pay.show', $order) }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all hover:scale-105">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                            </svg>
                                            {{ __('myorder.upload_proof_btn') }}
                                        </a>
                                    @else
                                        <a href="{{ route('checkout.pay.show', $order) }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-100 text-slate-800 font-bold rounded-xl hover:bg-slate-200 transition-colors">
                                            {{ __('myorder.view_payment_btn') }}
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
                        <div class="p-12 text-center">
                            <div class="w-24 h-24 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">{{ __('myorder.empty') }}</h3>
                            <a href="{{ route('event') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-xl hover:shadow-xl transition-all">
                                {{ __('myorder.go_to_events') }}
                            </a>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>

    <x-footer />
</div>
@endsection
