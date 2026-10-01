<section class="relative min-h-screen bg-gradient-to-b from-slate-50 to-white py-16">
    {{-- Decorative Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-20 w-64 h-64 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-20 left-20 w-64 h-64 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        {{-- Page Header --}}
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 py-2 px-4 rounded-full bg-purple-100 text-purple-600 text-sm font-bold uppercase tracking-wide mb-4">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd"></path>
                </svg>
                Secure Checkout
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-3">
                Complete Your
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">Order</span>
            </h1>
            <p class="text-lg text-slate-600">Fill in attendee details to proceed with your booking</p>
        </div>

        @if (empty($snapToken))
        <form action="{{ route('checkout.pay') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            @csrf

            {{-- Form Column --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Progress Indicator --}}
                <div class="bg-white rounded-2xl shadow-md border border-slate-100 p-6 mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold">
                                1
                            </div>
                            <div>
                                <p class="font-bold text-slate-900">Attendee Information</p>
                                <p class="text-sm text-slate-600">Fill in details for all tickets</p>
                            </div>
                        </div>
                        <div class="hidden md:flex items-center gap-2">
                            <div class="w-16 h-1 bg-slate-200 rounded"></div>
                            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-slate-200 text-slate-500 font-bold">
                                2
                            </div>
                            <p class="text-sm text-slate-500 ml-2">Payment</p>
                        </div>
                    </div>
                </div>

                {{-- Attendee Forms --}}
                @foreach ($individualTickets as $index => $ticket)
                <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden hover:shadow-xl transition-shadow">
                    {{-- Card Header --}}
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 md:px-8 py-5 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm border border-white/30">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-white font-bold text-lg">Attendee {{ $index + 1 }}</h2>
                                <p class="text-white/90 text-sm font-medium">{{ $ticket['name'] }}</p>
                            </div>
                        </div>
                        <div class="hidden sm:flex items-center gap-2 bg-white/20 backdrop-blur-sm border border-white/30 px-3 py-1.5 rounded-full">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                            </svg>
                            <span class="text-white text-sm font-semibold">Ticket #{{ $index + 1 }}</span>
                        </div>
                    </div>

                    {{-- Card Content --}}
                    <div class="p-6 md:p-8 space-y-6">
                        <input type="hidden" name="attendees[{{ $index }}][ticket_id]" value="{{ $ticket['ticket_id'] }}">

                        {{-- Name Fields --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-3">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    First Name
                                </label>
                                <input type="text" name="attendees[{{ $index }}][first_name]" value="{{ old('attendees.'.$index.'.first_name') }}" required class="w-full px-5 py-3.5 rounded-xl bg-slate-50 border-2 border-slate-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 focus:bg-white transition-all text-slate-900 placeholder-slate-400 font-medium" placeholder="e.g. John">
                                @error('attendees.'.$index.'.first_name')
                                <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-3">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Last Name
                                </label>
                                <input type="text" name="attendees[{{ $index }}][last_name]" value="{{ old('attendees.'.$index.'.last_name') }}" required class="w-full px-5 py-3.5 rounded-xl bg-slate-50 border-2 border-slate-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 focus:bg-white transition-all text-slate-900 placeholder-slate-400 font-medium" placeholder="e.g. Doe">
                                @error('attendees.'.$index.'.last_name')
                                <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        {{-- Contact Fields --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-3">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Email Address
                                </label>
                                <input type="email" name="attendees[{{ $index }}][email]" value="{{ old('attendees.'.$index.'.email') }}" required class="w-full px-5 py-3.5 rounded-xl bg-slate-50 border-2 border-slate-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 focus:bg-white transition-all text-slate-900 placeholder-slate-400 font-medium" placeholder="your@email.com">
                            </div>
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-3">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    Phone Number
                                </label>
                                <input type="tel" name="attendees[{{ $index }}][phone]" value="{{ old('attendees.'.$index.'.phone') }}" required placeholder="+62 812 3456 7890" class="w-full px-5 py-3.5 rounded-xl bg-slate-50 border-2 border-slate-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 focus:bg-white transition-all text-slate-900 placeholder-slate-400 font-medium">
                            </div>
                        </div>

                        {{-- ID & Birth Fields --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-3">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                    </svg>
                                    ID Card / KTP
                                </label>
                                <input type="text" inputmode="numeric" maxlength="16" name="attendees[{{ $index }}][identity_number]" value="{{ old('attendees.'.$index.'.identity_number') }}" required class="w-full px-5 py-3.5 rounded-xl bg-slate-50 border-2 border-slate-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 focus:bg-white transition-all text-slate-900 placeholder-slate-400 font-medium" placeholder="16 digit ID number">
                            </div>
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-3">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Birthdate
                                </label>
                                <input type="date" name="attendees[{{ $index }}][birthdate]" value="{{ old('attendees.'.$index.'.birthdate') }}" required class="w-full px-5 py-3.5 rounded-xl bg-slate-50 border-2 border-slate-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 focus:bg-white transition-all text-slate-900 font-medium">
                            </div>
                        </div>

                        {{-- Info Notice --}}
                        <div class="flex items-start gap-3 p-4 bg-blue-50 border border-blue-200 rounded-xl">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="text-sm text-blue-800">
                                <p class="font-semibold mb-1">Important Information</p>
                                <p>Please ensure all information is accurate as it will be used for verification at the event entrance.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Premium Summary Sidebar --}}
            <div class="lg:col-span-1">
                <div class="sticky top-8">
                    <div class="relative bg-white rounded-3xl shadow-2xl border-2 border-purple-100 overflow-hidden">
                        {{-- Decorative Elements --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-50 via-pink-50 to-purple-50 opacity-60"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 bg-purple-200 rounded-full filter blur-3xl opacity-30"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-pink-200 rounded-full filter blur-3xl opacity-30"></div>

                        <div class="relative p-8">
                            {{-- Header --}}
                            <div class="flex items-center gap-3 mb-6">
                                <div class="p-2 bg-gradient-to-br from-purple-100 to-pink-100 rounded-xl">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-extrabold text-slate-900">Order Summary</h3>
                            </div>

                            {{-- Items List --}}
                            <div class="space-y-3 mb-6">
                                @php $totalPrice = 0; @endphp
                                @foreach ($cart['tickets'] as $item)
                                @php $totalPrice += $item['selected_quantity'] * $item['price']; @endphp
                                <div class="bg-white/80 backdrop-blur-sm border border-purple-100 rounded-2xl p-4 shadow-sm hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 text-white text-xs font-bold">
                                                    {{ $item['selected_quantity'] }}
                                                </span>
                                                <span class="text-slate-900 font-bold text-sm">{{ $item['name'] }}</span>
                                            </div>
                                            <p class="text-slate-600 text-xs">@ Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                        </div>
                                        <span class="text-slate-900 font-extrabold">
                                            Rp {{ number_format($item['price'] * $item['selected_quantity'], 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            {{-- Total --}}
                            <div class="bg-gradient-to-br from-purple-50 to-pink-50 border-2 border-purple-200 rounded-2xl p-6 mb-6">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-slate-700 text-sm font-semibold">Subtotal</span>
                                    <span class="text-slate-900 font-bold">Rp {{ number_format($subtotal ?? $totalPrice ?? 0, 0, ',', '.') }}</span>
                                </div>
                                @foreach ($priceComponentsWithAmounts ?? [] as $component)
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-slate-700 text-sm font-semibold">{{ $component['name'] }}</span>
                                    <span class="text-slate-900 font-bold">Rp {{ number_format((int) $component['amount'], 0, ',', '.') }}</span>
                                </div>
                                @endforeach
                                <div class="flex justify-between items-center pt-4 mt-4 border-t border-purple-200">
                                    <span class="text-slate-900 text-lg font-bold">Total</span>
                                    <span class="text-2xl md:text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">
                                        Rp {{ number_format($total ?? $totalPrice ?? 0, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="group relative w-full py-4 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold text-lg shadow-lg hover:shadow-xl hover:shadow-purple-500/30 transform hover:scale-[1.02] transition-all overflow-hidden">
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    Proceed to Payment
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </button>

                            {{-- Security Badge --}}
                            <div class="mt-6 flex items-center justify-center gap-2 text-slate-600 text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <span>Secure payment powered by Midtrans</span>
                            </div>
                        </div>
                    </div>

                    {{-- Trust Badges --}}
                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <div class="bg-white rounded-xl p-3 text-center border border-slate-200">
                            <svg class="w-6 h-6 text-green-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            <p class="text-xs font-bold text-slate-700">Secure</p>
                        </div>
                        <div class="bg-white rounded-xl p-3 text-center border border-slate-200">
                            <svg class="w-6 h-6 text-blue-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <p class="text-xs font-bold text-slate-700">Fast</p>
                        </div>
                        <div class="bg-white rounded-xl p-3 text-center border border-slate-200">
                            <svg class="w-6 h-6 text-purple-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-xs font-bold text-slate-700">Verified</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        {{-- Payment Snap Section --}}
        @if (isset($snapToken))
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-3xl shadow-2xl border border-slate-100 p-10 md:p-12 text-center">
                {{-- Success Icon --}}
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full mb-6 shadow-lg">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                {{-- Content --}}
                <h2 class="text-3xl font-extrabold text-slate-900 mb-3">Order Created Successfully!</h2>
                <p class="text-lg text-slate-600 mb-8">Please complete your payment to receive your e-ticket instantly</p>

                {{-- Payment Button --}}
                <button id="pay-button" class="group inline-flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold text-lg rounded-full shadow-2xl hover:shadow-purple-500/50 transform hover:scale-105 transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    Pay Now
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>

                {{-- Security Info --}}
                <div class="mt-8 flex items-center justify-center gap-2 text-slate-500 text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <span>256-bit SSL Encrypted Payment</span>
                </div>
            </div>
        </div>

        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function() {
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        window.location.href = '/payment-success/{{ $order->transaction_code }}';
                    }
                    , onPending: function(result) {
                        alert("Waiting for your payment!");
                    }
                    , onError: function(result) {
                        window.location.href = '/payment-failed';
                    }
                    , onClose: function() {
                        alert('You closed the popup without finishing the payment');
                    }
                });
            };
            document.getElementById('pay-button').click();

        </script>
        @endif
    </div>
</section>

<style>
    @keyframes blob {

        0%,
        100% {
            transform: translate(0px, 0px) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

</style>
