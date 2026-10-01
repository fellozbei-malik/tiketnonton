<section class="min-h-screen bg-gradient-to-b from-slate-50 to-slate-100 py-12 md:py-20 px-4">
    <div class="max-w-5xl mx-auto">
        {{-- Back Button --}}
        <div class="mb-8">
            <a href="{{ route('myticket') }}" class="inline-flex items-center gap-2 text-slate-600 hover:text-purple-600 font-semibold transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to My Tickets
            </a>
        </div>

        {{-- Ticket Card --}}
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-200">
            {{-- Event Header --}}
            <div class="relative h-64 md:h-80 overflow-hidden">
                <img src="{{ Storage::url($ticket->event->thumbnail) }}" alt="Event" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
                    <div class="max-w-4xl mx-auto">
                        <div class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full mb-3">
                            <span class="text-white font-bold text-sm">{{ $ticket->ticket->name }}</span>
                        </div>
                        <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
                            {{ $ticket->event->name }}
                        </h1>
                        <div class="flex flex-wrap gap-4 text-white/90">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-semibold">{{ $ticket->event->start_time->format('l, d F Y') }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="font-semibold">{{ $ticket->event->start_time->format('H:i') }} WIB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ticket Details --}}
            <div class="p-6 md:p-10">
                <div class="max-w-4xl mx-auto">
                    {{-- Status Badge --}}
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-3">
                            @if ($ticket->order->status === \App\Models\Order::STATUS_PAID)
                                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-green-700 font-bold text-lg">Ticket Confirmed</span>
                            @else
                                <div class="w-3 h-3 bg-amber-500 rounded-full animate-pulse"></div>
                                <span class="text-amber-700 font-bold text-lg">Menunggu Verifikasi Pembayaran</span>
                            @endif
                        </div>
                        <span class="px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-700 font-bold rounded-full text-sm">
                            #{{ $ticket->order->transaction_code }}
                        </span>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        {{-- Left: Attendee & Event Info --}}
                        <div class="md:col-span-2 space-y-6">
                            {{-- Ticket Holder --}}
                            <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-2xl border border-purple-100">
                                <div class="flex items-start gap-4">
                                    <div class="w-14 h-14 bg-purple-200 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-7 h-7 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-purple-600 uppercase tracking-wider mb-2">Ticket Holder</p>
                                        <h3 class="text-2xl font-bold text-slate-900 mb-1">
                                            {{ ucwords($ticket->attendee->first_name) }} {{ ucwords($ticket->attendee->last_name) }}
                                        </h3>
                                        <p class="text-sm text-slate-600">{{ $ticket->attendee->email }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Event Details Grid --}}
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white border border-slate-200 p-5 rounded-xl hover:border-purple-200 transition-colors">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Date</p>
                                    <p class="font-bold text-slate-900">{{ $ticket->event->start_time->format('d F Y') }}</p>
                                </div>
                                <div class="bg-white border border-slate-200 p-5 rounded-xl hover:border-purple-200 transition-colors">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Time</p>
                                    <p class="font-bold text-slate-900">{{ $ticket->event->start_time->format('H:i') }} WIB</p>
                                </div>
                                <div class="bg-white border border-slate-200 p-5 rounded-xl hover:border-purple-200 transition-colors">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Category</p>
                                    <p class="font-bold text-purple-600">{{ $ticket->ticket->name }}</p>
                                </div>
                                <div class="bg-white border border-slate-200 p-5 rounded-xl hover:border-purple-200 transition-colors">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Gate</p>
                                    <p class="font-bold text-slate-900">Main Entrance</p>
                                </div>
                            </div>

                            {{-- Location --}}
                            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-6 rounded-2xl border border-blue-100">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-blue-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-blue-600 uppercase tracking-wider mb-2">Venue Location</p>
                                        <p class="font-bold text-slate-900 text-lg">{{ $ticket->event->location_name }}</p>
                                        <p class="text-slate-600">{{ $ticket->event->location_city }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Right: QR Code --}}
                        <div class="md:col-span-1">
                            <div class="bg-gradient-to-br from-slate-50 to-slate-100 p-8 rounded-2xl border-2 border-dashed border-slate-300 text-center sticky top-24">
                                <p class="text-sm font-bold text-slate-600 mb-4 uppercase tracking-wide">Scan to Enter</p>
                                <div class="bg-white p-4 rounded-xl inline-block mb-4 shadow-lg">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ $ticket->ticket_code }}" alt="QR Code" class="w-40 h-40">
                                </div>
                                <p class="text-xs font-mono font-bold text-slate-500 tracking-widest mb-6">{{ $ticket->ticket_code }}</p>

                                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-4">
                                    <div class="flex items-start gap-2 text-left">
                                        <svg class="w-5 h-5 text-yellow-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                        <p class="text-xs text-yellow-800 leading-relaxed">
                                            Show this QR code at the entrance. Do not share with others.
                                        </p>
                                    </div>
                                </div>

                                @if ($ticket->order->status === \App\Models\Order::STATUS_PAID)
                                    <a href="{{ route('myticket.download', $ticket) }}" class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Download PDF
                                    </a>
                                @else
                                    <p class="text-sm text-amber-700 font-medium">E-tiket dapat diunduh setelah pembayaran diverifikasi.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
