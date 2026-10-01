<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-black" x-data="{ 
    currentSlide: 0,
    slides: [
        '{{ asset('storage/images/bg-hero.jpg') }}',
        '{{ asset('storage/images/bg-hero-1.jpg') }}'
    ],
    autoPlay() {
        setInterval(() => {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        }, 5000);
    }
}" x-init="autoPlay()">

    {{-- Background Image Slider --}}
    <div class="absolute inset-0 z-0">
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="currentSlide === index" x-transition:enter="transition ease-in-out duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">
                <img :src="slide" :alt="'Slide ' + (index + 1)" class="w-full h-full object-cover brightness-50 grayscale">
            </div>
        </template>

        {{-- Dark Vignette Effect --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-black/70"></div>
    </div>

    {{-- Main Content --}}
    <div class="container mx-auto px-6 py-32 relative z-10">
        <div class="max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Left Side - Text Content --}}
                <div class="text-white space-y-6">
                    {{-- Main Heading --}}
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight">
                        <span class="block text-white drop-shadow-2xl" data-scroll="fade-up">
                            {{ __('common.find_your_next') }}
                        </span>
                        <span class="block mt-2 text-white drop-shadow-2xl" data-scroll="fade-up" data-scroll-delay="100">
                            {{ __('common.unforgettable_experience') }}
                        </span>
                    </h1>

                    {{-- Description --}}
                    <p class="text-lg md:text-xl text-gray-300 max-w-xl leading-relaxed drop-shadow-lg" data-scroll="fade-up" data-scroll-delay="300">
                        {{ __('common.discover_thousands') }}
                    </p>

                    {{-- CTA Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4 pt-4" data-scroll="fade-up" data-scroll-delay="400">
                        <a href="{{ route('event') }}" class="group relative px-8 py-4 bg-white text-black font-bold rounded-full overflow-hidden transition-all hover:scale-105 shadow-2xl hover:shadow-white/30 text-center">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                Explore Events
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </a>
                        <a href="#events" class="group px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-black transition-all hover:scale-105 shadow-xl text-center">
                            <span class="flex items-center justify-center gap-2">
                                {{ __('common.browse_categories') }}
                                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- Right Side - Empty space for visual balance --}}
                <div class="hidden lg:block"></div>
            </div>
        </div>
    </div>

    {{-- Slider Navigation Dots --}}
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 flex gap-3">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="currentSlide = index" class="group transition-all duration-300" :aria-label="'Go to slide ' + (index + 1)">
                <div class="w-3 h-3 rounded-full transition-all duration-300 shadow-lg" :class="currentSlide === index ? 'bg-white scale-125 shadow-white/50' : 'bg-white/50 hover:bg-white/75'">
                </div>
            </button>
        </template>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-20 right-10 z-10">
        <a href="#events" class="flex flex-col items-center gap-2 text-white/90 hover:text-white transition-colors group">
            <span class="text-sm font-semibold drop-shadow-lg">Scroll Down</span>
            <div class="animate-bounce">
                <svg class="w-6 h-6 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </div>
        </a>
    </div>
</section>

<style>
    @keyframes float-slow {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes float-slower {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-30px) rotate(180deg);
        }
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-float-slow {
        animation: float-slow 6s ease-in-out infinite;
    }

    .animate-float-slower {
        animation: float-slower 8s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }

    .animation-delay-200 {
        animation-delay: 0.2s;
    }

    .animation-delay-400 {
        animation-delay: 0.4s;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

</style>
