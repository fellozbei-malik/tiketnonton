<section class="bg-gradient-to-b from-slate-50 to-slate-100 py-12 md:py-20">
    <div class="container mx-auto px-4">
        {{-- Header --}}
        <div class="max-w-5xl mx-auto mb-12">
            <div class="text-center">
                <!-- <div class="inline-block px-4 py-2 bg-gradient-to-r from-purple-100 to-pink-100 rounded-full mb-4">
                    <span class="text-purple-700 font-semibold text-sm">Your Collection</span>
                </div> -->
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4">
                    My Tickets
                </h1>
                <p class="text-slate-600 text-lg">
                    Manage and view all your event tickets in one place
                </p>
            </div>
        </div>

        {{-- Tickets Grid --}}
        <div class="max-w-5xl mx-auto">
            @forelse ($myTickets as $item)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden mb-6 border border-slate-200 hover:border-purple-200 group">
                <div class="flex flex-col md:flex-row">
                    {{-- Event Image --}}
                    <div class="md:w-64 shrink-0 relative overflow-hidden">
                        <img src="{{ Storage::url($item->event->thumbnail) }}" alt="{{ $item->event->name }}" class="w-full h-56 md:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/95 backdrop-blur-sm text-purple-700 text-xs font-bold rounded-full shadow-lg">
                                {{ $item->ticket->name }}
                            </span>
                        </div>
                    </div>

                    {{-- Ticket Details --}}
                    <div class="flex-grow p-6 md:p-8 flex flex-col">
                        {{-- Event Info --}}
                        <div class="mb-6">
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2 group-hover:text-purple-700 transition-colors">
                                {{ $item->event->name }}
                            </h2>
                            <div class="flex items-center gap-2 text-slate-600">
                                <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="font-semibold">{{ ucwords($item->attendee->first_name) }} {{ ucwords($item->attendee->last_name) }}</span>
                            </div>
                        </div>

                        {{-- Event Details Grid --}}
                        <div class="grid md:grid-cols-2 gap-4 mb-6">
                            <div class="flex items-start gap-3 bg-gradient-to-br from-purple-50 to-pink-50 p-4 rounded-xl border border-purple-100">
                                <div class="w-10 h-10 bg-purple-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide mb-1">Date & Time</p>
                                    <p class="text-sm font-bold text-slate-900">{{ $item->event->start_time->format('l, d F Y') }}</p>
                                    <p class="text-sm text-slate-600">{{ $item->event->start_time->format('h:i A') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 bg-gradient-to-br from-blue-50 to-cyan-50 p-4 rounded-xl border border-blue-100">
                                <div class="w-10 h-10 bg-blue-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide mb-1">Location</p>
                                    <p class="text-sm font-bold text-slate-900">{{ $item->event->location_name }}</p>
                                    <p class="text-sm text-slate-600">{{ $item->event->location_city }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Action Button --}}
                        <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-200">
                            <div class="flex items-center gap-2 text-sm">
                                @if ($item->order->status === \App\Models\Order::STATUS_PAID)
                                    <span class="text-green-600 font-medium flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Confirmed
                                    </span>
                                @else
                                    <span class="text-amber-600 font-medium flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Menunggu Verifikasi
                                    </span>
                                @endif
                            </div>
                            @if ($item->order->status === \App\Models\Order::STATUS_PAID)
                            <a href="{{ route('myticket.detail', $item) }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:from-purple-700 hover:to-pink-700 transition-all hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                </svg>
                                View Ticket
                            </a>
                            @else
                            <span class="inline-flex items-center gap-2 px-6 py-3 bg-slate-800 text-slate-300 font-bold rounded-xl cursor-not-allowed opacity-75" aria-disabled="true">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                </svg>
                                View Ticket
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            {{-- Empty State --}}
            <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
                <div class="p-12 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">No Tickets Yet</h3>
                    <p class="text-slate-600 mb-6 max-w-md mx-auto">
                        You don't have any tickets yet. Explore our amazing events and book your experience today!
                    </p>
                    <a href="{{ route('event') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:from-purple-700 hover:to-pink-700 transition-all hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Explore Events
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
