<section class="bg-black">
    {{-- Premium Hero Section --}}
    <div class="relative w-full h-[70vh] md:h-[80vh] overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="{{ Storage::url($event->thumbnail) }}" alt="{{ $event->name }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
        </div>

        {{-- Content --}}
        <div class="relative h-full flex items-end">
            <div class="container mx-auto px-6 md:px-12 pb-16 md:pb-20">
                <div class="max-w-4xl">
                    {{-- Category Badge --}}
                    @if ($event->eventCategory)
                    <div class="inline-flex items-center gap-2 py-2 px-4 rounded-full bg-white text-black text-xs md:text-sm font-bold tracking-wide uppercase mb-6 shadow-xl">
                        {{ $event->eventCategory->name }}
                    </div>
                    @endif

                    {{-- Event Title --}}
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold mb-6 text-white leading-tight drop-shadow-2xl">
                        {{ $event->name }}
                    </h1>

                    {{-- Event Meta Info --}}
                    <div class="flex flex-col md:flex-row gap-4 md:gap-8">
                        {{-- Date & Time --}}
                        <div class="flex items-start gap-3 backdrop-blur-sm bg-white/10 rounded-2xl p-4 border border-white/20 hover:bg-white/20 transition-all">
                            <div class="p-3 bg-white/10 rounded-xl">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/80 text-xs font-semibold uppercase tracking-wider mb-1">Date & Time</p>
                                <p class="text-white font-bold">{{ $event->start_time->format('l, d F Y') }}</p>
                                <p class="text-white/90 text-sm">{{ $event->start_time->format('H:i') }} WIB</p>
                            </div>
                        </div>

                        {{-- Location --}}
                        <div class="flex items-start gap-3 backdrop-blur-sm bg-white/10 rounded-2xl p-4 border border-white/20 hover:bg-white/20 transition-all">
                            <div class="p-3 bg-white/10 rounded-xl">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/80 text-xs font-semibold uppercase tracking-wider mb-1">Location</p>
                                <p class="text-white font-bold">{{ $event->location_name }}</p>
                                <p class="text-white/90 text-sm">{{ $event->location_city }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content Section --}}
    <div class="container mx-auto px-6 md:px-12 py-16 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            {{-- Left Content --}}
            <div class="lg:col-span-2 space-y-12">
                {{-- About Event --}}
                <div class="bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 p-8 md:p-10 hover:border-white/20 transition-all">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-white/10 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white">About This Event</h2>
                    </div>
                    <div class="prose prose-lg prose-invert max-w-none text-gray-300 leading-relaxed event-description">
                        {!! $event->description !!}
                    </div>

                    <style>
                        .event-description img {
                            display: block !important;
                            max-width: 100%;
                            height: auto;
                            border-radius: 1rem;
                            margin: 1.5rem 0;
                            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
                        }

                        /* Hide figcaption with attachment info */
                        .event-description figcaption,
                        .event-description .attachment__caption,
                        .event-description .attachment__name,
                        .event-description .attachment__size {
                            display: none !important;
                        }

                        /* Style figure element if exists */
                        .event-description figure {
                            margin: 1.5rem 0;
                        }

                    </style>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            setTimeout(function() {
                                const description = document.querySelector('.event-description');
                                if (!description) return;

                                // Remove all figcaption elements (file metadata)
                                const figcaptions = description.querySelectorAll('figcaption');
                                figcaptions.forEach(function(caption) {
                                    caption.remove();
                                });

                                // Remove elements with attachment classes
                                const attachmentElements = description.querySelectorAll('.attachment__caption, .attachment__name, .attachment__size');
                                attachmentElements.forEach(function(el) {
                                    el.remove();
                                });

                                // Style all images
                                const images = description.querySelectorAll('img');
                                images.forEach(function(img) {
                                    img.style.display = 'block';
                                    img.style.maxWidth = '100%';
                                    img.style.height = 'auto';
                                    img.style.borderRadius = '1rem';
                                    img.style.margin = '1.5rem 0';
                                    img.style.boxShadow = '0 10px 40px rgba(0, 0, 0, 0.3)';
                                });
                            }, 100);
                        });

                    </script>
                </div>

                {{-- Location Map --}}
                @if($event->latitude && $event->longitude)
                <div class="bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 p-8 md:p-10 hover:border-white/20 transition-all">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-white/10 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white">Event Location</h2>
                    </div>
                    <div id="map" class="w-full h-96 rounded-2xl overflow-hidden border-2 border-white/20 shadow-xl"></div>
                    <div hidden id="lang">{{$event->latitude}}</div>
                    <div hidden id="long">{{$event->longitude}}</div>

                    {{-- Address Info --}}
                    <div class="mt-6 space-y-4">
                        <div class="flex items-start gap-3 p-4 bg-white/5 rounded-xl border border-white/10">
                            <svg class="w-5 h-5 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <p class="font-bold text-white">{{ $event->location_name }}</p>
                                <p class="text-gray-400 text-sm">{{ $event->location_city }}</p>
                            </div>
                        </div>

                        {{-- Google Maps Button --}}
                        <a href="https://www.google.com/maps/search/?api=1&query={{ $event->latitude }},{{ $event->longitude }}" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-center gap-3 w-full px-6 py-4 bg-white text-black rounded-xl font-bold shadow-lg hover:shadow-2xl hover:shadow-white/30 transform hover:scale-[1.02] transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                            </svg>
                            <span>Open in Google Maps</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endif
            </div>

            {{-- Right Sidebar - Sticky CTA --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    {{-- Premium Ticket Card --}}
                    <div class="relative bg-white/5 backdrop-blur-sm rounded-3xl overflow-hidden border border-white/20">
                        <div class="relative p-8">
                            {{-- Header --}}
                            <div class="mb-6">
                                <h3 class="text-2xl font-extrabold text-white mb-2">Get Your Tickets</h3>
                                <p class="text-gray-400 text-sm">Secure your spot at this amazing event</p>
                            </div>

                            {{-- CTA Button --}}
                            <a href="{{ route('ticket.index', $event->slug) }}" class="group relative block w-full text-center py-4 px-6 rounded-xl bg-white text-black font-bold shadow-xl hover:shadow-2xl hover:shadow-white/30 transform hover:scale-[1.02] transition-all duration-300 overflow-hidden">
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                    </svg>
                                    Buy Tickets Now
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                            </a>

                            {{-- Trust Badges --}}
                            <div class="mt-6 pt-6 border-t border-white/20">
                                <div class="grid grid-cols-2 gap-4 text-center">
                                    <div class="flex flex-col items-center gap-2">
                                        <div class="p-2 bg-white/10 rounded-lg">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs text-gray-300 font-semibold">Official Tickets</span>
                                    </div>
                                    <div class="flex flex-col items-center gap-2">
                                        <div class="p-2 bg-white/10 rounded-lg">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs text-gray-300 font-semibold">Secure Payment</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Additional Info --}}
                            <div class="mt-6 space-y-3">
                                <div class="flex items-center gap-3 text-sm text-gray-300">
                                    <svg class="w-4 h-4 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <span>Instant e-ticket delivery</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-gray-300">
                                    <svg class="w-4 h-4 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                    <span>Multiple payment methods</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-gray-300">
                                    <svg class="w-4 h-4 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    <span>24/7 customer support</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Share Section --}}
                    <div class="mt-6 bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 p-6">
                        <p class="text-sm font-semibold text-gray-400 mb-3">Share this event</p>
                        <div class="flex gap-2">
                            <button class="flex-1 p-3 rounded-xl bg-white/10 text-white hover:bg-white/20 transition-colors border border-white/10">
                                <svg class="w-5 h-5 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" /></svg>
                            </button>
                            <button class="flex-1 p-3 rounded-xl bg-white/10 text-white hover:bg-white/20 transition-colors border border-white/10">
                                <svg class="w-5 h-5 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" /></svg>
                            </button>
                            <button class="flex-1 p-3 rounded-xl bg-white/10 text-white hover:bg-white/20 transition-colors border border-white/10">
                                <svg class="w-5 h-5 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" /></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@if($event->latitude && $event->longitude)
@push('scripts')
<script>
    var lang = document.querySelector('div[id=lang]').textContent
    var long = document.querySelector('div[id=long]').textContent
    var center = [lang, long];
    var propertiesmap = L.map('map').setView(center, 15);

    propertiesmap.invalidateSize();

    var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 19
        , subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    googleStreets.addTo(propertiesmap)

    var marker = L.marker([lang, long]).addTo(propertiesmap);

    setTimeout(function() {
        window.dispatchEvent(new Event("resize"));
    }, 500);

</script>
@endpush
@endif

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

    .animate-float-slow {
        animation: float-slow 6s ease-in-out infinite;
    }

    .animate-float-slower {
        animation: float-slower 8s ease-in-out infinite;
    }

</style>
