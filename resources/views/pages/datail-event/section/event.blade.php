<section class="py-16 md:py-20 bg-gradient-to-b from-black to-gray-900">
    <div class="container mx-auto px-6 md:px-12">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
                Discover More Amazing Events
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">
                Don't miss out on other exciting events happening around you
            </p>
        </div>

        {{-- Events Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($otherEvents as $otherEvent)
            <a href="{{ route('event.detail', $otherEvent->slug) }}" class="group">
                <div class="bg-white/5 backdrop-blur-sm rounded-2xl overflow-hidden border border-white/10 hover:border-white/30 hover:shadow-2xl hover:shadow-white/10 hover:-translate-y-2 transition-all duration-300">
                    {{-- Image --}}
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ Storage::url($otherEvent->thumbnail) }}" alt="{{ $otherEvent->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                        {{-- Date Badge --}}
                        <div class="absolute top-4 right-4 bg-white rounded-xl p-3 text-center shadow-xl min-w-[60px]">
                            <span class="block text-xs font-bold text-gray-600 uppercase">{{ $otherEvent->start_time->format('M') }}</span>
                            <span class="block text-2xl font-extrabold text-black leading-none">{{ $otherEvent->start_time->format('d') }}</span>
                        </div>

                        {{-- Category Badge --}}
                        @if ($otherEvent->eventCategory)
                        <div class="absolute bottom-4 left-4">
                            <span class="inline-block bg-white text-black text-xs font-bold px-3 py-1 rounded-full shadow-xl">
                                {{ $otherEvent->eventCategory->name }}
                            </span>
                        </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-gray-200 transition-colors">
                            {{ $otherEvent->name }}
                        </h3>

                        {{-- Event Info --}}
                        <div class="space-y-2 text-sm text-gray-300">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ $otherEvent->start_time->format('l, d M Y') }}</span>
                            </div>
                            @if($otherEvent->location_name)
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="truncate">{{ $otherEvent->location_name }}</span>
                            </div>
                            @endif
                        </div>

                        {{-- CTA --}}
                        <div class="mt-4 pt-4 border-t border-white/10">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-400 font-medium">Get Tickets</span>
                                <div class="flex items-center gap-1 text-white font-bold group-hover:gap-2 transition-all">
                                    <span class="text-sm">View Details</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- View All Button --}}
        <div class="text-center mt-12">
            <a href="{{ route('event') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-black font-bold rounded-full hover:bg-gray-200 transform hover:scale-105 transition-all shadow-2xl hover:shadow-white/30">
                <span>Explore All Events</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
