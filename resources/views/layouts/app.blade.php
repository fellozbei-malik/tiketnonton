<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiketnonton.com - Discover Experience</title>

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('storage/favicon/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('storage/favicon/favicon.ico') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/favicon/favicon.ico') }}">

    {{-- Font: Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    {{-- Libraries --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Scroll Animation Styles */
        [data-scroll] {
            opacity: 0;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        [data-scroll].is-visible {
            opacity: 1;
        }

        /* Fade Up Animation */
        [data-scroll="fade-up"] {
            transform: translateY(60px);
        }

        [data-scroll="fade-up"].is-visible {
            transform: translateY(0);
        }

        /* Fade Down Animation */
        [data-scroll="fade-down"] {
            transform: translateY(-60px);
        }

        [data-scroll="fade-down"].is-visible {
            transform: translateY(0);
        }

        /* Fade Left Animation */
        [data-scroll="fade-left"] {
            transform: translateX(60px);
        }

        [data-scroll="fade-left"].is-visible {
            transform: translateX(0);
        }

        /* Fade Right Animation */
        [data-scroll="fade-right"] {
            transform: translateX(-60px);
        }

        [data-scroll="fade-right"].is-visible {
            transform: translateX(0);
        }

        /* Zoom In Animation */
        [data-scroll="zoom-in"] {
            transform: scale(0.85);
        }

        [data-scroll="zoom-in"].is-visible {
            transform: scale(1);
        }

        /* Zoom Out Animation */
        [data-scroll="zoom-out"] {
            transform: scale(1.15);
        }

        [data-scroll="zoom-out"].is-visible {
            transform: scale(1);
        }

        /* Rotate Animation */
        [data-scroll="rotate"] {
            transform: rotate(-10deg) scale(0.9);
        }

        [data-scroll="rotate"].is-visible {
            transform: rotate(0) scale(1);
        }

        /* Flip Animation */
        [data-scroll="flip-left"] {
            transform: perspective(2500px) rotateY(-100deg);
        }

        [data-scroll="flip-left"].is-visible {
            transform: perspective(2500px) rotateY(0);
        }

        /* Animation Delays */
        [data-scroll-delay="100"] {
            transition-delay: 0.1s;
        }

        [data-scroll-delay="200"] {
            transition-delay: 0.2s;
        }

        [data-scroll-delay="300"] {
            transition-delay: 0.3s;
        }

        [data-scroll-delay="400"] {
            transition-delay: 0.4s;
        }

        [data-scroll-delay="500"] {
            transition-delay: 0.5s;
        }

        [data-scroll-delay="600"] {
            transition-delay: 0.6s;
        }

        [data-scroll-delay="700"] {
            transition-delay: 0.7s;
        }

        [data-scroll-delay="800"] {
            transition-delay: 0.8s;
        }

        /* Animation Duration */
        [data-scroll-duration="slow"] {
            transition-duration: 1.2s;
        }

        [data-scroll-duration="fast"] {
            transition-duration: 0.5s;
        }

    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased flex flex-col min-h-screen">

    {{-- Splash Screen --}}
    <x-splash-screen />

    <div class="flex-grow">
        @yield('content')
    </div>

    @if (session('toast'))
    <x-toast :message="session('toast')['message']" :type="session('toast')['type']" />
    @endif

    @livewireScripts

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toast notification
            const toastElement = document.getElementById('toast-notification');
            if (toastElement) {
                setTimeout(() => {
                    toastElement.classList.remove('opacity-0', 'translate-x-full');
                }, 100);
                setTimeout(() => {
                    toastElement.classList.add('opacity-0', 'translate-x-full');
                    setTimeout(() => toastElement.remove(), 500);
                }, 5000);
                const closeButton = toastElement.querySelector('[data-dismiss-target]');
                if (closeButton) {
                    closeButton.addEventListener('click', () => {
                        toastElement.classList.add('opacity-0', 'translate-x-full');
                        setTimeout(() => toastElement.remove(), 500);
                    });
                }
            }

            // Scroll Animation Observer
            const scrollElements = document.querySelectorAll('[data-scroll]');

            const elementInView = (el, percentageScroll = 100) => {
                const elementTop = el.getBoundingClientRect().top;
                return (
                    elementTop <=
                    (window.innerHeight || document.documentElement.clientHeight) * (percentageScroll / 100)
                );
            };

            const displayScrollElement = (element) => {
                element.classList.add('is-visible');
            };

            const hideScrollElement = (element) => {
                element.classList.remove('is-visible');
            };

            const handleScrollAnimation = () => {
                scrollElements.forEach((el) => {
                    if (elementInView(el, 85)) {
                        displayScrollElement(el);
                    }
                });
            };

            // Use Intersection Observer for better performance
            if ('IntersectionObserver' in window) {
                const scrollObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            // Optional: unobserve after animation (one-time animation)
                            // scrollObserver.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1
                    , rootMargin: '0px 0px -15% 0px'
                });

                scrollElements.forEach(el => scrollObserver.observe(el));
            } else {
                // Fallback for older browsers
                window.addEventListener('scroll', handleScrollAnimation);
                handleScrollAnimation(); // Initial check
            }
        });

        // Re-initialize scroll animations for dynamically loaded content (Livewire)
        document.addEventListener('livewire:navigated', function() {
            const scrollElements = document.querySelectorAll('[data-scroll]:not(.is-visible)');

            if ('IntersectionObserver' in window) {
                const scrollObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                        }
                    });
                }, {
                    threshold: 0.1
                    , rootMargin: '0px 0px -15% 0px'
                });

                scrollElements.forEach(el => scrollObserver.observe(el));
            }
        });

    </script>
</body>
</html>
