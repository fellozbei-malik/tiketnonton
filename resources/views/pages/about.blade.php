@extends('layouts.app')

@section('content')
<div class="bg-black min-h-screen">
    <x-navbar />

    {{-- Hero Section --}}
    <section class="relative py-24 md:py-32 overflow-hidden bg-gradient-to-b from-black to-gray-900">
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
        <div class="container mx-auto px-4 sm:px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
                    {{ __('about.hero_title_line1') }}
                    <span class="block sm:inline bg-gradient-to-r from-purple-400 via-pink-400 to-indigo-400 bg-clip-text text-transparent">
                        {{ __('about.hero_title_line2') }}
                    </span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto leading-relaxed">
                    {{ __('about.hero_subtitle') }}
                </p>
            </div>
        </div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-pink-500/10 rounded-full blur-3xl"></div>
    </section>

    {{-- Our Story Section --}}
    <section class="py-16 md:py-20 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="max-w-6xl mx-auto">
                <div class="grid md:grid-cols-2 gap-10 md:gap-12 items-center mb-16 md:mb-20">
                    <div class="order-2 md:order-1">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-5">
                            {{ __('about.story_title') }}
                        </h2>
                        <div class="space-y-4 text-white/90 leading-relaxed text-sm md:text-base">
                            <p>{{ __('about.story_paragraph1') }}</p>
                            <p>{{ __('about.story_paragraph2') }}</p>
                            <p>{{ __('about.story_paragraph3') }}</p>
                        </div>
                    </div>
                    <div class="relative order-1 md:order-2">
                        <div class="relative aspect-[4/3] md:h-96 rounded-2xl overflow-hidden bg-gradient-to-br from-purple-600 to-pink-600">
                            @if(file_exists(storage_path('app/public/images/partner-banner.jpg')))
                                <img src="{{ asset('storage/images/partner-banner.jpg') }}" alt="Our Story" class="w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-5 md:p-6 text-center">
                        <div class="text-3xl md:text-4xl font-extrabold text-white mb-1">30+</div>
                        <div class="text-white/70 text-xs md:text-sm">{{ __('about.stat_years') }}</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-5 md:p-6 text-center">
                        <div class="text-3xl md:text-4xl font-extrabold text-white mb-1">10K+</div>
                        <div class="text-white/70 text-xs md:text-sm">{{ __('about.stat_events') }}</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-5 md:p-6 text-center">
                        <div class="text-3xl md:text-4xl font-extrabold text-white mb-1">500K+</div>
                        <div class="text-white/70 text-xs md:text-sm">{{ __('about.stat_customers') }}</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-5 md:p-6 text-center">
                        <div class="text-3xl md:text-4xl font-extrabold text-white mb-1">100+</div>
                        <div class="text-white/70 text-xs md:text-sm">{{ __('about.stat_cities') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- What We Do Section --}}
    <section class="py-16 md:py-20 bg-gradient-to-b from-black to-gray-900">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12 md:mb-16">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">
                        {{ __('about.what_we_do_title') }}
                    </h2>
                    <p class="text-base md:text-lg text-white/70 max-w-2xl mx-auto">
                        {{ __('about.what_we_do_subtitle') }}
                    </p>
                </div>
                <div class="grid sm:grid-cols-2 gap-6 md:gap-8">
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-6 md:p-8 hover:border-purple-500/50 transition-all">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-3">{{ __('about.service_ticketing_title') }}</h3>
                        <p class="text-white/90 text-sm md:text-base leading-relaxed">{{ __('about.service_ticketing_desc') }}</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-6 md:p-8 hover:border-pink-500/50 transition-all">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-br from-pink-500 to-purple-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-3">{{ __('about.service_crowd_title') }}</h3>
                        <p class="text-white/90 text-sm md:text-base leading-relaxed">{{ __('about.service_crowd_desc') }}</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-6 md:p-8 hover:border-indigo-500/50 transition-all">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-3">{{ __('about.service_impresario_title') }}</h3>
                        <p class="text-white/90 text-sm md:text-base leading-relaxed">{{ __('about.service_impresario_desc') }}</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-6 md:p-8 hover:border-purple-500/50 transition-all">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-3">{{ __('about.service_production_title') }}</h3>
                        <p class="text-white/90 text-sm md:text-base leading-relaxed">{{ __('about.service_production_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Overview: KBLI through Tiketnonton.com --}}
    <section class="py-16 md:py-24 bg-black relative overflow-hidden">
        <div class="absolute top-1/4 left-0 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl -translate-x-1/2"></div>
        <div class="absolute bottom-1/4 right-0 w-80 h-80 bg-pink-500/10 rounded-full blur-3xl translate-x-1/2"></div>
        <div class="container mx-auto px-4 sm:px-6 relative z-10">
            <div class="max-w-6xl mx-auto space-y-14 md:space-y-20">
                {{-- KBLI --}}
                <div class="relative rounded-2xl md:rounded-3xl overflow-hidden border border-white/10 bg-gradient-to-br from-white/[0.08] to-transparent">
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-gradient-to-b from-purple-500 via-pink-500 to-indigo-500"></div>
                    <div class="pl-6 px-6 py-8 md:pl-12 md:px-8 md:py-12">
                        <div class="mb-8">
                            <span class="text-xs font-semibold uppercase tracking-widest text-white/80">KBLI</span>
                            <h2 class="text-2xl md:text-3xl font-extrabold text-white mt-2">{{ __('about.kbli_title') }}</h2>
                            <p class="text-white/70 mt-2 max-w-xl text-sm md:text-base">{{ __('about.kbli_subtitle') }}</p>
                        </div>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
                            @foreach(__('about.kbli_items') as $i => $item)
                                <div class="py-3 px-4 rounded-xl bg-white/5 border border-white/10 hover:border-purple-500/40 hover:bg-white/[0.08] transition-all duration-300 flex items-center justify-center">
                                    <!-- <span class="text-[10px] font-mono text-white/60">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span> -->
                                    <p class="text-white/90 text-sm leading-snug mt-1">{{ $item }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Production Concert + Gathering --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="rounded-2xl md:rounded-3xl p-6 md:p-10 bg-gradient-to-br from-purple-500/10 to-transparent border border-purple-500/20 overflow-hidden">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-500/20 text-white/80 text-xs font-semibold mb-4">Production</span>
                        <h2 class="text-xl md:text-2xl font-extrabold text-white mb-4">{{ __('about.production_concert_title') }}</h2>
                        <div class="space-y-3">
                            @foreach(__('about.production_concert_items') as $item)
                                <div class="py-2 px-4 rounded-xl bg-black/30 border border-white/5 text-white/90 text-sm hover:bg-black/50 hover:border-purple-500/20 transition-colors">{{ $item }}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="rounded-2xl md:rounded-3xl p-6 md:p-10 bg-gradient-to-br from-pink-500/10 to-transparent border border-pink-500/20 overflow-hidden">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-pink-500/20 text-white/80 text-xs font-semibold mb-4">Event</span>
                        <h2 class="text-xl md:text-2xl font-extrabold text-white mb-2">{{ __('about.gathering_title') }}</h2>
                        <p class="text-white/70 text-sm mb-4">{{ __('about.gathering_subtitle') }}</p>
                        <div class="space-y-3">
                            @foreach(__('about.gathering_items') as $item)
                                <div class="py-2 px-4 rounded-xl bg-black/30 border border-white/5 text-white/90 text-sm hover:bg-black/50 hover:border-pink-500/20 transition-colors">{{ $item }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Impresariat --}}
                <div class="rounded-2xl md:rounded-3xl border border-white/10 bg-white/[0.03] overflow-hidden">
                    <div class="h-1.5 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
                    <div class="p-6 md:p-12">
                        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
                            <div>
                                <h2 class="text-2xl md:text-3xl font-extrabold text-white">{{ __('about.impresariat_title') }}</h2>
                                <p class="text-white/80 mt-2 text-sm md:text-base">{{ __('about.impresariat_subtitle') }}</p>
                            </div>
                            <span class="text-5xl md:text-6xl font-black text-white/5 select-none hidden md:block">IMPRESARIAT</span>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-4">
                            @foreach(__('about.impresariat_items') as $i => $item)
                                <div class="flex gap-4 p-4 rounded-xl md:rounded-2xl bg-white/5 border border-white/10 hover:border-indigo-500/30 transition-colors">
                                    <span class="flex-shrink-0 w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500/30 to-purple-500/30 flex items-center justify-center text-white/90 font-bold text-sm">{{ $i + 1 }}</span>
                                    <p class="text-white/90 text-sm leading-relaxed pt-0.5 flex items-center justify-center">{{ $item }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Ticketing Management --}}
                <div class="rounded-2xl md:rounded-3xl p-6 md:p-12 border border-white/10 bg-gradient-to-b from-white/[0.06] to-transparent">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white">{{ __('about.ticketing_title') }}</h2>
                        <p class="text-white/70 mt-2 max-w-2xl mx-auto text-sm md:text-base">{{ __('about.ticketing_subtitle') }}</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        @foreach(__('about.ticketing_items') as $item)
                            <div class="py-3 px-4 rounded-xl bg-white/[0.04] border border-white/10 text-white/90 text-sm leading-snug hover:bg-white/[0.08] hover:border-white/20 transition-all duration-300">{{ $item }}</div>
                        @endforeach
                    </div>
                </div>

                {{-- Tiketnonton.com --}}
                <div class="rounded-2xl md:rounded-3xl p-6 md:p-12 relative overflow-hidden border border-white/10">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 via-transparent to-pink-500/5"></div>
                    <div class="relative">
                        <div class="flex flex-wrap items-center gap-3 mb-6">
                            <h2 class="text-2xl md:text-3xl font-extrabold text-white">{{ __('about.tiketnonton_title') }}</h2>
                            <span class="px-3 py-1 rounded-full bg-white/10 text-white/90 text-xs font-medium">Official</span>
                        </div>
                        <ul class="space-y-4 text-white/90 max-w-3xl">
                            @foreach(__('about.tiketnonton_items') as $item)
                                <li class="flex items-start gap-3 p-4 rounded-xl bg-black/40 border border-white/10 backdrop-blur-sm">
                                    <span class="text-purple-400 mt-0.5 flex-shrink-0">•</span>
                                    <span class="text-sm md:text-base leading-relaxed">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Founders Section --}}
    <section class="py-20 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
                        {{ __('about.founders_title') }}
                    </h2>
                    <p class="text-xl text-white/70 max-w-3xl mx-auto">
                        {{ __('about.founders_subtitle') }}
                    </p>
                </div>

                @php
                    $founderDir = storage_path('app/public/images/founder');
                    $founderImages = collect(['founder1.png', 'founder2.png', 'founder3.png', 'founder4.png', 'founder5.png', 'founder6.png', 'founder7.png'])
                        ->map(fn ($name) => ['path' => $founderDir . '/' . $name, 'url' => asset('storage/images/founder/' . $name), 'name' => $name])
                        ->values();
                    $gradients = ['from-purple-600 to-pink-600', 'from-pink-600 to-purple-600', 'from-indigo-600 to-purple-600', 'from-purple-600 to-indigo-600'];
                @endphp
                {{-- 4 atas, 3 bawah (3 bawah di tengah) --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    @foreach($founderImages as $index => $founder)
                    @php
                        $colStart = $index === 4 ? 'md:col-start-2' : ($index === 5 ? 'md:col-start-3' : ($index === 6 ? 'md:col-start-4' : ''));
                    @endphp
                    <div class="group {{ $colStart }}">
                        <div class="relative aspect-square rounded-2xl overflow-hidden bg-gradient-to-br {{ $gradients[$index % 4] }} mb-4">
                            @if(file_exists($founder['path']))
                            <img src="{{ $founder['url'] }}" alt="{{ __('about.founders_title') }} {{ $index + 1 }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Client References Section --}}
    <section class="py-16 md:py-20 bg-gradient-to-b from-black to-gray-900 overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-3">{{ __('about.clients_title') }}</h2>
                    <p class="text-base md:text-lg text-white/70">{{ __('about.clients_subtitle') }}</p>
                </div>
            </div>
        </div>
        @php
            $clients = __('about.clients_items');
            $rows = array_chunk($clients, (int) ceil(count($clients) / 3));
        @endphp
        <div class="space-y-6 mt-8">
            @foreach($rows as $rowClients)
                <div class="overflow-hidden">
                    <div class="flex animate-marquee gap-6">
                        @foreach($rowClients as $client)
                            <span class="px-6 py-3 bg-white/5 border border-white/10 rounded-xl text-white/90 flex-shrink-0 text-sm md:text-base font-medium">{{ $client }}</span>
                        @endforeach
                        @foreach($rowClients as $client)
                            <span class="px-6 py-3 bg-white/5 border border-white/10 rounded-xl text-white/90 flex-shrink-0 text-sm md:text-base font-medium">{{ $client }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <style>
            @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
            .animate-marquee { display: flex; width: max-content; animation: marquee 90s linear infinite; }
        </style>
    </section>

    {{-- Our Values Section --}}
    <section class="py-16 md:py-20 bg-gradient-to-b from-black to-gray-900">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">{{ __('about.values_title') }}</h2>
                    <p class="text-base md:text-lg text-white/70 max-w-2xl mx-auto">{{ __('about.values_subtitle') }}</p>
                </div>
                <div class="grid sm:grid-cols-3 gap-6 md:gap-8">
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-6 md:p-8 text-center">
                        <div class="w-14 h-14 md:w-16 md:h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-white mb-3">{{ __('about.value_excellence_title') }}</h3>
                        <p class="text-white/70 text-sm md:text-base leading-relaxed">{{ __('about.value_excellence_desc') }}</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-6 md:p-8 text-center">
                        <div class="w-14 h-14 md:w-16 md:h-16 bg-gradient-to-br from-pink-500 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-white mb-3">{{ __('about.value_collaboration_title') }}</h3>
                        <p class="text-white/70 text-sm md:text-base leading-relaxed">{{ __('about.value_collaboration_desc') }}</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl md:rounded-2xl p-6 md:p-8 text-center">
                        <div class="w-14 h-14 md:w-16 md:h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-white mb-3">{{ __('about.value_innovation_title') }}</h3>
                        <p class="text-white/70 text-sm md:text-base leading-relaxed">{{ __('about.value_innovation_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 md:py-20 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="max-w-3xl mx-auto text-center">
                <div class="bg-gradient-to-br from-purple-500/20 to-pink-500/20 border border-purple-500/30 rounded-2xl md:rounded-3xl p-8 md:p-12">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">{{ __('about.cta_title') }}</h2>
                    <p class="text-white/90 text-sm md:text-base mb-3 max-w-xl mx-auto">{{ __('about.cta_subtitle') }}</p>
                    <p class="text-white font-semibold text-sm md:text-base mb-6">{{ __('about.cta_footer') }}</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="{{ route('joint-partner') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-black font-bold rounded-full hover:bg-gray-200 transition-all hover:scale-105 text-sm md:text-base">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            {{ __('about.cta_become_partner') }}
                        </a>
                        <a href="{{ route('services') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white/10 backdrop-blur-sm border border-white/30 text-white font-bold rounded-full hover:bg-white/20 transition-all hover:scale-105 text-sm md:text-base">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ __('about.cta_view_services') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Portal Berita Section --}}
    <section class="py-16 md:py-20 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-3">{{ __('about.news_title') }}</h2>
                    <p class="text-white/70 text-sm md:text-base">{{ __('about.news_subtitle') }}</p>
                </div>
                <a href="https://www.kompasiana.com/musanz80636/6963ceaa34777c4af72a4982/dewo-hadi-soeprobo-dibalik-tiket-nonton-dan-impresiat-dunia-showbiz-indonesia" target="_blank" rel="noopener noreferrer" class="group block rounded-2xl border border-white/10 bg-white/5 hover:bg-white/10 hover:border-purple-500/40 transition-all duration-300 overflow-hidden">
                    <div class="p-6 md:p-8">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500/30 to-pink-500/30 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-xs font-semibold text-purple-400 uppercase tracking-wider">{{ __('about.news_kompasiana_source') }}</span>
                                <h3 class="text-lg md:text-xl font-bold text-white mt-2 mb-3 group-hover:text-purple-300 transition-colors">
                                    {{ __('about.news_kompasiana_title') }}
                                </h3>
                                <span class="inline-flex items-center gap-2 text-sm font-medium text-white/80 group-hover:text-white">
                                    {{ __('about.news_read_article') }}
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <x-footer />
</div>
@endsection
