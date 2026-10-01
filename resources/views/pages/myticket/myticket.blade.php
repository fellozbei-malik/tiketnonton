@extends('layouts.app')

@section('content')
<div class="bg-white">

    <x-navbarBlack />

    <div class="pt-28">
        @if (session('message'))
            <div class="container mx-auto px-4 mb-4">
                <div class="max-w-5xl mx-auto rounded-xl bg-green-50 border border-green-200 text-green-800 px-4 py-3 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('message') }}</span>
                </div>
            </div>
        @endif
        @if (session('info'))
            <div class="container mx-auto px-4 mb-4">
                <div class="max-w-5xl mx-auto rounded-xl bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('info') }}</span>
                </div>
            </div>
        @endif
        @include('pages.myticket.section.content')
    </div>


    <x-footer />

</div>
@endsection
