@extends('layouts.app')

@section('content')
<div class="bg-black min-h-screen">
    <x-navbar />

    {{-- Hero Section --}}
    <section class="relative py-24 overflow-hidden bg-gradient-to-b from-black to-gray-900">
        {{-- Separator Border --}}
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    {{ __('services.hero_title') }}
                </h1>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto mb-8">
                    {{ __('services.hero_subtitle') }}
                </p>
                <a href="{{ route('joint-partner') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-black font-bold rounded-full hover:bg-gray-200 transition-all hover:scale-105 shadow-2xl hover:shadow-white/30">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    {{ __('services.join_as_partner') }}
                </a>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-16 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto space-y-16">

                {{-- MANAGEMENT TICKETING CONCERT --}}
                <div class="bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 overflow-hidden">
                    {{-- Image Section --}}
                    <div class="relative h-64 md:h-80 bg-gradient-to-br from-purple-600 via-purple-500 to-pink-500 overflow-hidden">
                        {{-- Placeholder for image: storage/app/public/images/service-ticketing.jpg --}}
                        @if(file_exists(storage_path('app/public/images/service-ticketing.jpg')))
                        <img src="{{ asset('storage/images/service-ticketing.jpg') }}" alt="Management Ticketing Concert" class="w-full h-full object-cover">
                        @else
                        {{-- Placeholder pattern --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-600 via-purple-500 to-pink-500"></div>
                        <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                        {{-- Title on Image --}}
                        <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-sm border border-white/30 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-3xl md:text-4xl font-extrabold text-white">
                                    {{ __('services.ticketing_title') }}
                                </h2>
                            </div>
                        </div>
                    </div>

                    {{-- Content Section --}}
                    <div class="p-8 md:p-12">

                        <div class="space-y-6">
                            <div class="bg-purple-500/10 border border-purple-500/20 rounded-2xl p-6">
                                <p class="text-gray-300 leading-relaxed">
                                    {{ __('services.ticketing_disclaimer') }}
                                </p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 hover:border-purple-500/50 transition-all">
                                    <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        {{ __('services.ticketing_concert_title') }}
                                    </h3>
                                    <p class="text-gray-300 leading-relaxed text-sm">
                                        {{ __('services.ticketing_concert_desc') }}
                                    </p>
                                </div>

                                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 hover:border-purple-500/50 transition-all">
                                    <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        {{ __('services.ticket_box_title') }}
                                    </h3>
                                    <p class="text-gray-300 leading-relaxed text-sm">
                                        {{ __('services.ticket_box_desc') }}
                                    </p>
                                </div>

                                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 hover:border-purple-500/50 transition-all">
                                    <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        {{ __('services.online_system_title') }}
                                    </h3>
                                    <p class="text-gray-300 leading-relaxed text-sm">
                                        {{ __('services.online_system_desc') }}
                                    </p>
                                </div>

                                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 hover:border-purple-500/50 transition-all">
                                    <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        {{ __('services.promotion_services_title') }}
                                    </h3>
                                    <p class="text-gray-300 leading-relaxed text-sm">
                                        {{ __('services.promotion_services_desc') }}
                                    </p>
                                </div>
                            </div>

                            <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                                <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ __('services.tax_events_title') }}
                                </h3>
                                <p class="text-gray-300 leading-relaxed">
                                    {{ __('services.tax_events_desc') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CROWD CONTROL SERVICES --}}
                <div class="bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 overflow-hidden">
                    {{-- Image Section --}}
                    <div class="relative h-64 md:h-80 bg-gradient-to-br from-pink-600 via-pink-500 to-purple-500 overflow-hidden">
                        {{-- Placeholder for image: storage/app/public/images/service-crowd.jpg --}}
                        @if(file_exists(storage_path('app/public/images/service-crowd.jpg')))
                        <img src="{{ asset('storage/images/service-crowd.jpg') }}" alt="Crowd Control Services" class="w-full h-full object-cover">
                        @else
                        {{-- Placeholder pattern --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-pink-600 via-pink-500 to-purple-500"></div>
                        <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                        {{-- Title on Image --}}
                        <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-sm border border-white/30 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-3xl md:text-4xl font-extrabold text-white">
                                    {{ __('services.crowd_control_title') }}
                                </h2>
                            </div>
                        </div>
                    </div>

                    {{-- Content Section --}}
                    <div class="p-8 md:p-12">

                        <div class="space-y-6">
                            <p class="text-gray-300 leading-relaxed text-lg">
                                {{ __('services.crowd_control_desc') }}
                            </p>

                            <div class="bg-pink-500/10 border border-pink-500/20 rounded-2xl p-6">
                                <h3 class="text-xl font-bold text-white mb-4">{{ __('services.internal_security_title') }}</h3>
                                <div class="grid md:grid-cols-2 gap-3">
                                    <div class="flex items-center gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ __('services.internal_security') }}
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ __('services.internal_artist_security') }}
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ __('services.ticket_takers') }}
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ __('services.doorman') }}
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ __('services.ushers') }}
                                    </div>
                                </div>
                            </div>

                            <p class="text-gray-300 leading-relaxed">
                                {{ __('services.crowd_control_note') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- IMPRESARIO SERVICES --}}
                <div class="bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 overflow-hidden">
                    {{-- Image Section --}}
                    <div class="relative h-64 md:h-80 bg-gradient-to-br from-indigo-600 via-indigo-500 to-purple-500 overflow-hidden">
                        {{-- Placeholder for image: storage/app/public/images/service-impresario.jpg --}}
                        @if(file_exists(storage_path('app/public/images/service-impresario.jpg')))
                        <img src="{{ asset('storage/images/service-impresario.jpg') }}" alt="Impresario Services" class="w-full h-full object-cover">
                        @else
                        {{-- Placeholder pattern --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-indigo-500 to-purple-500"></div>
                        <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                        {{-- Title on Image --}}
                        <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-sm border border-white/30 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-3xl md:text-4xl font-extrabold text-white">
                                    {{ __('services.impresario_title') }}
                                </h2>
                            </div>
                        </div>
                    </div>

                    {{-- Content Section --}}
                    <div class="p-8 md:p-12">

                        <div class="space-y-6">
                            <div class="bg-indigo-500/10 border border-indigo-500/20 rounded-2xl p-6">
                                <h3 class="text-xl font-bold text-white mb-3">{{ __('services.sgs_impresario') }}</h3>
                                <p class="text-gray-300 leading-relaxed">
                                    <span class="text-white font-semibold">{{ __('services.sgs_impresario_full') }}</span> {{ __('services.sgs_impresario_desc') }}
                                </p>
                            </div>

                            <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                                <h3 class="text-xl font-bold text-white mb-4">{{ __('services.documents_title') }}</h3>
                                <div class="grid md:grid-cols-2 gap-3">
                                    <div class="flex items-start gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ __('services.document_rptka') }}</span>
                                    </div>
                                    <div class="flex items-start gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ __('services.document_visa') }}</span>
                                    </div>
                                    <div class="flex items-start gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ __('services.document_dpkk') }}</span>
                                    </div>
                                    <div class="flex items-start gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ __('services.document_imta') }}</span>
                                    </div>
                                    <div class="flex items-start gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ __('services.document_stm') }}</span>
                                    </div>
                                    <div class="flex items-start gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ __('services.document_sensor') }}</span>
                                    </div>
                                    <div class="flex items-start gap-2 text-gray-300">
                                        <svg class="w-5 h-5 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ __('services.document_tourism') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                                <h3 class="text-xl font-bold text-white mb-4">{{ __('services.artists_title') }}</h3>
                                <ul class="space-y-2 text-gray-300">
                                    <li class="flex items-center gap-2">
                                        <span class="w-2 h-2 bg-indigo-400 rounded-full"></span>
                                        {{ __('services.artist_1') }}
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span class="w-2 h-2 bg-indigo-400 rounded-full"></span>
                                        {{ __('services.artist_2') }}
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span class="w-2 h-2 bg-indigo-400 rounded-full"></span>
                                        {{ __('services.artist_3') }}
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span class="w-2 h-2 bg-indigo-400 rounded-full"></span>
                                        {{ __('services.artist_4') }}
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span class="w-2 h-2 bg-indigo-400 rounded-full"></span>
                                        {{ __('services.artist_5') }}
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span class="w-2 h-2 bg-indigo-400 rounded-full"></span>
                                        {{ __('services.artist_6') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CONSULTANT PRODUCTION CONCERT SERVICES --}}
                <div class="bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 overflow-hidden">
                    {{-- Image Section --}}
                    <div class="relative h-64 md:h-80 bg-gradient-to-br from-purple-600 via-purple-500 to-indigo-500 overflow-hidden">
                        {{-- Placeholder for image: storage/app/public/images/service-consultant.jpg --}}
                        @if(file_exists(storage_path('app/public/images/service-consultant.jpg')))
                        <img src="{{ asset('storage/images/service-consultant.jpg') }}" alt="Consultant Production Concert" class="w-full h-full object-cover">
                        @else
                        {{-- Placeholder pattern --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-600 via-purple-500 to-indigo-500"></div>
                        <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                        {{-- Title on Image --}}
                        <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-sm border border-white/30 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-3xl md:text-4xl font-extrabold text-white">
                                    {{ __('services.consultant_title') }}
                                </h2>
                            </div>
                        </div>
                    </div>

                    {{-- Content Section --}}
                    <div class="p-8 md:p-12">

                        <div class="space-y-6">
                            <p class="text-gray-300 leading-relaxed text-lg">
                                {{ __('services.consultant_desc') }}
                            </p>

                            <div class="bg-purple-500/10 border border-purple-500/20 rounded-2xl p-6">
                                <h3 class="text-xl font-bold text-white mb-4">{{ __('services.consultant_scope_title') }}</h3>
                                <p class="text-gray-300 leading-relaxed mb-4">
                                    {{ __('services.consultant_scope_desc') }}
                                </p>
                            </div>

                            <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                                <h3 class="text-xl font-bold text-white mb-4">{{ __('services.consultant_team_title') }}</h3>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="flex items-center gap-3 bg-white/5 rounded-xl p-4">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-white font-semibold">{{ __('services.team_production_manager') }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-xl p-4">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-white font-semibold">{{ __('services.team_production_area') }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-xl p-4">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-white font-semibold">{{ __('services.team_show_management') }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-xl p-4">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-white font-semibold">{{ __('services.team_sound_engineering') }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-xl p-4">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-white font-semibold">{{ __('services.team_lighting_designer') }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-xl p-4">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-white font-semibold">{{ __('services.team_electric_man') }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-xl p-4">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-white font-semibold">{{ __('services.team_facility_man') }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 bg-white/5 rounded-xl p-4">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-white font-semibold">{{ __('services.team_hospitality') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CTA Section --}}
                <div class="pt-8">
                    <div class="relative bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl overflow-hidden">
                        {{-- Background Image --}}
                        <div class="relative h-96 md:h-[500px] overflow-hidden">
                            {{-- Placeholder for image: storage/app/public/images/partner-banner.jpg --}}
                            @if(file_exists(storage_path('app/public/images/partner-banner.jpg')))
                            <img src="{{ asset('storage/images/partner-banner.jpg') }}" alt="Partner With Us" class="w-full h-full object-cover">
                            @else
                            {{-- Placeholder gradient --}}
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-600 via-pink-500 to-indigo-600"></div>
                            <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z\' fill=\'%23ffffff\' fill-opacity=\'0.3\' fill-rule=\'evenodd\'/%3E%3C/svg%3E');"></div>
                            @endif

                            {{-- Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-black/40"></div>

                            {{-- Content --}}
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center px-6 max-w-4xl">
                                    <div class="mb-6">
                                        <div class="inline-block p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 mb-6">
                                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                                        {{ __('services.cta_title') }}
                                    </h2>
                                    <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto">
                                        {{ __('services.cta_subtitle') }}
                                    </p>

                                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                                        <a href="{{ route('joint-partner') }}" class="inline-flex items-center gap-2 px-10 py-5 bg-white text-black font-bold rounded-full hover:bg-gray-200 transition-all hover:scale-105 shadow-2xl hover:shadow-white/30 text-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            {{ __('services.cta_join_now') }}
                                        </a>
                                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-10 py-5 bg-white/10 backdrop-blur-sm border border-white/30 text-white font-bold rounded-full hover:bg-white/20 transition-all hover:scale-105 text-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ __('services.cta_learn_more') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <x-footer />
</div>
@endsection
