<div class="bg-gradient-to-b from-black to-gray-900 py-20">
    <div class="container mx-auto px-6">
        {{-- Section Header --}}
        <header class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4" data-scroll="fade-up">
                {{ __('common.news_articles') }}
            </h2>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto" data-scroll="fade-up" data-scroll-delay="100">
                {{ __('common.discover_latest') }}
            </p>
        </header>

        {{-- Articles Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($posts as $post)
            <a href="{{ route('blog.detail', $post) }}" class="group block" data-scroll="fade-up" data-scroll-delay="{{ ($loop->index % 3) * 100 }}">
                <article class="h-full flex flex-col bg-white/5 backdrop-blur-sm rounded-3xl hover:bg-white/10 transition-all duration-300 overflow-hidden border border-white/10 hover:border-white/30 hover:-translate-y-2 hover:shadow-2xl hover:shadow-white/10">
                    {{-- Image --}}
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500 grayscale group-hover:grayscale-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
                    </div>

                    {{-- Content --}}
                    <div class="flex flex-col flex-grow p-7">
                        {{-- Meta Info --}}
                        <div class="flex items-center gap-3 text-sm text-gray-400 mb-4">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-medium">{{ $post->published_at->format('d M Y') }}</span>
                            </div>
                            <span class="text-gray-600">•</span>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="font-medium">{{ $post->user->name }}</span>
                            </div>
                        </div>

                        {{-- Title --}}
                        <h3 class="text-xl font-bold text-white mb-3 leading-tight line-clamp-2 group-hover:text-gray-200 transition-colors">
                            {{ $post->title }}
                        </h3>

                        {{-- Excerpt --}}
                        <p class="text-gray-400 text-base leading-relaxed mb-6 flex-grow line-clamp-3">
                            {{ $post->excerpt }}
                        </p>

                        {{-- Read More Link --}}
                        <div class="pt-5 border-t border-white/10 flex items-center justify-between">
                            <span class="text-sm font-semibold text-gray-500">{{ __('common.continue_reading') }}</span>
                            <div class="flex items-center gap-2 text-white font-bold text-sm group-hover:gap-3 transition-all">
                                <span>{{ __('common.read_more') }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>
            </a>
            @empty
            <div class="col-span-full py-20 text-center">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-white/5 border border-white/10 mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">{{ __('common.no_articles_found') }}</h3>
                <p class="text-gray-400 text-lg">{{ __('common.check_back_soon') }}</p>
            </div>
            @endforelse
        </div>

        {{-- Load More Button --}}
        @if(isset($posts) && $posts->count() > 0)
        <div class="text-center mt-16">
            <button wire:click="loadMore" class="group px-10 py-4 bg-white text-black font-bold rounded-full hover:bg-gray-200 transform hover:scale-105 transition-all shadow-2xl hover:shadow-white/30">
                <span wire:loading.remove wire:target="loadMore" class="flex items-center gap-2">
                    {{ __('common.load_more_articles') }}
                    <svg class="w-5 h-5 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </span>
                <span wire:loading wire:target="loadMore" class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ __('common.loading') }}
                </span>
            </button>
        </div>
        @endif
    </div>
</div>
