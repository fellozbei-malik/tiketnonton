<div id="events" class="bg-gradient-to-b from-gray-900 to-black pb-20 pt-20">
    {{-- Premium Filter Section --}}
    <div class="container mx-auto px-6 relative mb-20" x-data="{ activeDropdown: null }" @click.away="activeDropdown = null">
        <div class="backdrop-blur-xl bg-white/5 rounded-3xl shadow-2xl p-8 md:p-10 border border-white/10">
            {{-- Section Header --}}
            <div class="mb-6">
                <h3 class="text-2xl font-extrabold text-white mb-2">{{ __('common.find_perfect_event') }}</h3>
                <p class="text-gray-400">{{ __('common.search_and_filter') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Search --}}
                <div class="relative group">
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">{{ __('common.search_event') }}</label>
                    <div class="flex items-center bg-white/5 border-2 border-white/10 rounded-2xl px-5 py-4 group-focus-within:border-white group-focus-within:bg-white/10 group-focus-within:shadow-lg group-focus-within:shadow-white/10 transition-all duration-300 hover:border-white/50 hover:bg-white/10 hover:shadow-md">
                        <svg class="w-5 h-5 text-gray-400 mr-3 group-focus-within:text-white transition-colors flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input wire:model.live.debounce.300ms="search" type="text" placeholder="e.g. Jazz Festival" class="w-full bg-transparent border-none focus:ring-0 text-white font-semibold placeholder-gray-500 text-base focus:outline-none">
                    </div>
                </div>

                {{-- Event Category --}}
                <div class="relative z-40">
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">{{ __('common.event_category') }}</label>
                    <div class="relative">
                        <button @click.stop="activeDropdown = activeDropdown === 'theme' ? null : 'theme'" type="button" class="w-full flex items-center justify-between bg-white/5 border-2 border-white/10 rounded-2xl px-5 py-4 text-left transition-all duration-300 hover:border-white/50 hover:bg-white/10 hover:shadow-md focus:outline-none focus:border-white focus:bg-white/10 focus:shadow-lg focus:shadow-white/10 cursor-pointer" :class="{'border-white bg-white/10 shadow-lg shadow-white/10': activeDropdown === 'theme'}">
                            <div class="flex items-center flex-1 min-w-0">
                                <svg class="w-5 h-5 text-gray-400 mr-3 flex-shrink-0 transition-colors" :class="{'text-white': activeDropdown === 'theme'}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                <span class="text-white font-semibold text-base truncate">
                                    @if($event_category_id)
                                    {{ $categories->firstWhere('id', $event_category_id)?->name ?? __('common.all_categories') }}
                                    @else
                                    {{ __('common.all_categories') }}
                                    @endif
                                </span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 ml-3 flex-shrink-0 transition-all duration-300" :class="{'text-white rotate-180': activeDropdown === 'theme'}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="activeDropdown === 'theme'" x-cloak @dropdown-updated.window="activeDropdown = null" class="absolute z-[100] mt-3 w-full bg-black/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
                            <div class="max-h-64 overflow-auto">
                                <button type="button" wire:click="setEventCategory('')" class="w-full px-5 py-3.5 text-left text-white font-semibold hover:bg-white/10 transition-colors flex items-center cursor-pointer relative z-10 {{ empty($event_category_id) ? 'bg-white/20' : '' }}">
                                    <span>{{ __('common.all_categories') }}</span>
                                </button>
                                @foreach ($categories as $category)
                                <button type="button" wire:click="setEventCategory({{ $category->id }})" class="w-full px-5 py-3.5 text-left text-white font-semibold hover:bg-white/10 transition-colors flex items-center cursor-pointer relative z-10 {{ $event_category_id == $category->id ? 'bg-white/20' : '' }}">
                                    <span>{{ $category->name }}</span>
                                </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Date --}}
                <div class="relative z-30">
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">{{ __('common.date') }}</label>
                    <div class="relative">
                        <button @click.stop="activeDropdown = activeDropdown === 'date' ? null : 'date'" type="button" class="w-full flex items-center justify-between bg-white/5 border-2 border-white/10 rounded-2xl px-5 py-4 text-left transition-all duration-300 hover:border-white/50 hover:bg-white/10 hover:shadow-md focus:outline-none focus:border-white focus:bg-white/10 focus:shadow-lg focus:shadow-white/10 cursor-pointer" :class="{'border-white bg-white/10 shadow-lg shadow-white/10': activeDropdown === 'date'}">
                            <div class="flex items-center flex-1 min-w-0">
                                <svg class="w-5 h-5 text-gray-400 mr-3 flex-shrink-0 transition-colors" :class="{'text-white': activeDropdown === 'date'}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-white font-semibold text-base truncate">
                                    {{ ucfirst($time) }}
                                </span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 ml-3 flex-shrink-0 transition-all duration-300" :class="{'text-white rotate-180': activeDropdown === 'date'}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="activeDropdown === 'date'" x-cloak @dropdown-updated.window="activeDropdown = null" class="absolute z-[100] mt-3 w-full bg-black/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
                            <div class="max-h-64 overflow-auto">
                                <button type="button" wire:click="setTime('all')" class="w-full px-5 py-3.5 text-left text-white font-semibold hover:bg-white/10 transition-colors flex items-center cursor-pointer relative z-10 {{ $time == 'all' ? 'bg-white/20' : '' }}">
                                    <span>All</span>
                                </button>
                                <button type="button" wire:click="setTime('today')" class="w-full px-5 py-3.5 text-left text-white font-semibold hover:bg-white/10 transition-colors flex items-center cursor-pointer relative z-10 {{ $time == 'today' ? 'bg-white/20' : '' }}">
                                    <span>{{ __('common.today') }}</span>
                                </button>
                                <button type="button" wire:click="setTime('tomorrow')" class="w-full px-5 py-3.5 text-left text-white font-semibold hover:bg-white/10 transition-colors flex items-center cursor-pointer relative z-10 {{ $time == 'tomorrow' ? 'bg-white/20' : '' }}">
                                    <span>{{ __('common.tomorrow') }}</span>
                                </button>
                                <button type="button" wire:click="setTime('this_week')" class="w-full px-5 py-3.5 text-left text-white font-semibold hover:bg-white/10 transition-colors flex items-center cursor-pointer relative z-10 {{ $time == 'this_week' ? 'bg-white/20' : '' }}">
                                    <span>{{ __('common.this_week') }}</span>
                                </button>
                                <button type="button" wire:click="setTime('this_weekend')" class="w-full px-5 py-3.5 text-left text-white font-semibold hover:bg-white/10 transition-colors flex items-center cursor-pointer relative z-10 {{ $time == 'this_weekend' ? 'bg-white/20' : '' }}">
                                    <span>{{ __('common.this_weekend') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Events Grid --}}
    <div class="container mx-auto px-6">
        @if ($events->isEmpty())
        <div class="text-center py-20">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-white/5 border border-white/10 mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-white mb-3">{{ __('common.no_events_found') }}</h3>
            <p class="text-gray-400 text-lg max-w-md mx-auto">{{ __('common.we_couldnt_find') }}</p>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($events as $event)
            <div class="group event-card-fade-in bg-white/10 backdrop-blur-sm rounded-3xl overflow-hidden border border-white/20 hover:border-white/40 transition-all duration-500 hover:shadow-2xl hover:shadow-white/20 hover:-translate-y-2" style="animation-delay: {{ $loop->index * 50 }}ms">
                {{-- Event Image --}}
                <div class="relative overflow-hidden aspect-[16/10]">
                    <img src="{{ Storage::url($event->thumbnail) }}" alt="{{ $event->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                    {{-- Category Badge --}}
                    <div class="absolute top-5 left-5">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-white text-black shadow-xl">
                            {{ $event->eventCategory->name ?? 'General' }}
                        </span>
                    </div>

                    {{-- Date Badge --}}
                    <div class="absolute bottom-5 left-5 bg-white rounded-xl px-4 py-2 shadow-xl">
                        <div class="flex items-center gap-2 text-sm font-bold text-black">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $event->start_time->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Event Details --}}
                <div class="p-8 space-y-5">
                    {{-- Event Name --}}
                    <h3 class="text-2xl font-bold text-white line-clamp-2 group-hover:text-gray-100 transition-colors">
                        {{ $event->name }}
                    </h3>

                    {{-- Event Info Grid --}}
                    <div class="space-y-3">
                        {{-- Date & Time --}}
                        <div class="flex items-center gap-3 text-gray-300">
                            <svg class="w-5 h-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <div class="text-base">
                                <p class="font-semibold">{{ $event->start_time->format('l, d M Y') }}</p>
                                <p class="text-sm text-gray-400">{{ $event->start_time->format('H:i') }} - {{ $event->end_time->format('H:i') }} WIB</p>
                            </div>
                        </div>

                        {{-- Location --}}
                        <div class="flex items-start gap-3 text-gray-300">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div class="text-base">
                                @if($event->location_name)
                                <p class="font-semibold">{{ $event->location_name }}</p>
                                @if($event->location_city)
                                <p class="text-sm text-gray-400">{{ $event->location_city }}</p>
                                @endif
                                @else
                                <p class="font-semibold">{{ $event->location_city ?? 'Location TBA' }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Price & CTA --}}
                    <div class="flex items-center justify-between pt-5 border-t border-white/20">
                        <div>
                            <p class="text-sm text-gray-300 mb-1 font-semibold">Starting from</p>
                            <p class="text-xl font-bold text-white">
                                Rp {{ number_format($event->tickets->min('price') ?? 0, 0, ',', '.') }}
                            </p>
                        </div>
                        <a href="{{ route('event.detail', $event->slug) }}" class="px-6 py-3 bg-white text-black font-bold rounded-full hover:bg-gray-100 transition-all hover:scale-105 text-base shadow-xl">
                            View
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Load More --}}
        @if ($events->count() >= $perPage && $events->count() < $totalEvents) <div class="text-center mt-12">
            <button wire:click="loadMore" wire:loading.attr="disabled" class="group px-8 py-4 bg-white text-black font-bold rounded-full hover:bg-gray-200 transition-all hover:scale-105 shadow-xl disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove>
                    <span class="flex items-center gap-2">
                        Load More Events
                        <svg class="w-5 h-5 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </span>
                </span>
                <span wire:loading>
                    <span class="flex items-center gap-2">
                        <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Loading...
                    </span>
                </span>
            </button>
    </div>
    @endif
</div>

<style>
    [x-cloak] {
        display: none !important;
    }

    .event-card-fade-in {
        animation: event-card-fade-in 0.4s ease-out forwards;
        opacity: 0;
    }
    @keyframes event-card-fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>
</div>
