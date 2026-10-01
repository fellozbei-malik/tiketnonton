@extends('layouts.app')

@section('content')
<div class="bg-white">
    <x-navbarBlack />

    <section class="relative min-h-screen bg-gradient-to-b from-slate-50 to-white py-16">
        <div class="container mx-auto px-4 lg:px-10 pt-28 relative z-10">
            <div class="max-w-2xl mx-auto">
                {{-- Header --}}
                <div class="text-center mb-8">
                    <!-- <div class="inline-flex items-center gap-2 py-2 px-4 rounded-full bg-purple-100 text-purple-600 text-sm font-bold uppercase tracking-wide mb-4">
                        {{ __('checkout.pay_title') }}
                    </div> -->
                    <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-2">
                        {{ __('checkout.order_created') }}
                    </h1>
                    <p class="text-slate-600">{{ __('checkout.scan_qris') }}</p>
                </div>

                <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
                    {{-- Order summary --}}
                    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-wide mb-1">No. Pesanan</p>
                        <p class="text-xl font-bold text-slate-900">{{ $order->transaction_code }}</p>
                        <p class="mt-3 text-slate-600">
                            {{ __('checkout.total_pay') }}:
                            <span class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </span>
                        </p>
                    </div>

                    {{-- QRIS --}}
                    <div class="p-8 flex flex-col items-center">
                        <img id="qris-image" src="{{ asset('images/qris.png') }}" alt="QRIS" class="w-full h-auto object-contain rounded-xl border-2 border-slate-200">
                        <a href="{{ asset('images/qris.png') }}" download="qris-{{ $order->transaction_code }}.png" class="mt-4 inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl border-2 border-slate-300 text-slate-700 font-bold hover:bg-slate-50 hover:border-slate-400 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            {{ __('checkout.download_qris') }}
                        </a>
                    </div>

                    {{-- Terms and conditions --}}
                    <div class="px-6 pb-6">
                        <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wide mb-3">{{ __('checkout.terms_title') }}</h3>
                        <ul class="space-y-2 text-sm text-slate-600 list-disc list-inside">
                            <li>{{ __('checkout.terms_1') }}</li>
                            <li>{{ __('checkout.terms_2') }}</li>
                            <li>{{ __('checkout.terms_3') }}</li>
                            <li>{{ __('checkout.terms_4') }}</li>
                        </ul>
                    </div>

                    {{-- Sudah Bayar + Upload --}}
                    <div class="p-6 pt-0">
                        @if ($order->status === \App\Models\Order::STATUS_PENDING_VERIFICATION)
                            <div class="rounded-xl bg-amber-50 border border-amber-200 p-4 flex items-center gap-3">
                                <svg class="w-6 h-6 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-amber-800 font-medium">{{ __('checkout.verification_message') }}</p>
                            </div>
                            <a href="{{ route('myticket') }}" class="mt-4 w-full inline-flex items-center justify-center gap-2 py-4 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold shadow-lg hover:shadow-xl transition-all">
                                {{ __('common.my_ticket') }}
                            </a>
                        @else
                            <button type="button" id="btn-already-paid" class="w-full py-4 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ __('checkout.already_paid') }}
                            </button>

                            <div id="upload-box" class="mt-6 hidden">
                                <form action="{{ route('checkout.pay.upload-proof', $order) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                    @csrf
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">{{ __('checkout.upload_proof') }}</label>
                                        <div class="rounded-xl border-2 border-slate-200 bg-slate-50 p-4">
                                            <input type="file" id="input-payment-proof" name="payment_proof" accept="image/jpeg,image/jpg,image/png" required
                                                class="w-full text-sm text-slate-600 file:mr-4 file:py-2.5 file:px-5 file:rounded-lg file:border-2 file:border-slate-300 file:bg-white file:font-semibold file:text-slate-700 hover:file:bg-slate-50 hover:file:border-slate-400 file:cursor-pointer">
                                            <p id="file-name-display" class="mt-2 text-sm text-slate-500 hidden"></p>
                                        </div>
                                        <p class="mt-1 text-xs text-slate-500">{{ __('checkout.upload_proof_hint') }}</p>
                                        @error('payment_proof')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" id="btn-upload-submit" class="w-full py-3 rounded-xl bg-slate-800 text-white font-bold hover:bg-slate-900 transition-colors hidden">
                                        {{ __('checkout.upload_proof') }}
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</div>

@if ($order->status === \App\Models\Order::STATUS_PENDING)
<script>
    document.getElementById('btn-already-paid').addEventListener('click', function () {
        document.getElementById('upload-box').classList.toggle('hidden');
    });

    var inputProof = document.getElementById('input-payment-proof');
    var btnSubmit = document.getElementById('btn-upload-submit');
    var fileNameDisplay = document.getElementById('file-name-display');
    if (inputProof && btnSubmit) {
        inputProof.addEventListener('change', function () {
            if (this.files && this.files.length > 0) {
                btnSubmit.classList.remove('hidden');
                if (fileNameDisplay) {
                    fileNameDisplay.textContent = this.files[0].name;
                    fileNameDisplay.classList.remove('hidden');
                }
            } else {
                btnSubmit.classList.add('hidden');
                if (fileNameDisplay) {
                    fileNameDisplay.textContent = '';
                    fileNameDisplay.classList.add('hidden');
                }
            }
        });
    }
</script>
@endif
@endsection
