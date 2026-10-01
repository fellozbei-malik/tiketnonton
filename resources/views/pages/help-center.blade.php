@extends('layouts.app')

@section('content')
<div class="bg-black min-h-screen">
    <x-navbar />

    {{-- Hero Section --}}
    <section class="relative py-24 overflow-hidden bg-gradient-to-b from-black to-gray-900">
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 mb-6">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Help Center
                </h1>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    Find answers to common questions and get the support you need
                </p>
            </div>
        </div>
    </section>

    {{-- Quick Support Section --}}
    <section class="py-16 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6 mb-16">
                    {{-- Contact Support --}}
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8 hover:border-purple-500/50 transition-all text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Email Support</h3>
                        <p class="text-gray-400 text-sm mb-4">Get help via email</p>
                        <a href="mailto:support@tiketnonton.com" class="text-purple-400 hover:text-purple-300 font-semibold">
                            support@tiketnonton.com
                        </a>
                    </div>

                    {{-- Live Chat --}}
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8 hover:border-pink-500/50 transition-all text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">WhatsApp</h3>
                        <p class="text-gray-400 text-sm mb-4">Chat with our team</p>
                        <a href="https://wa.me/6281290779080" target="_blank" class="text-pink-400 hover:text-pink-300 font-semibold">
                            +62 812-9077-9080
                        </a>
                    </div>

                    {{-- FAQ --}}
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8 hover:border-indigo-500/50 transition-all text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">FAQ</h3>
                        <p class="text-gray-400 text-sm mb-4">Browse common questions</p>
                        <a href="{{ route('faq') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold">
                            View FAQ
                        </a>
                    </div>
                </div>

                {{-- Common Topics --}}
                <div class="mb-16">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-8 text-center">
                        Common Topics
                    </h2>

                    <div class="grid md:grid-cols-2 gap-6">
                        {{-- Buying Tickets --}}
                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white mb-3">Buying Tickets</h3>
                                    <ul class="space-y-2 text-gray-400 text-sm">
                                        <li>• How to purchase tickets online</li>
                                        <li>• Payment methods accepted</li>
                                        <li>• Order confirmation process</li>
                                        <li>• Ticket delivery options</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Account & Login --}}
                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-pink-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white mb-3">Account & Login</h3>
                                    <ul class="space-y-2 text-gray-400 text-sm">
                                        <li>• Creating an account</li>
                                        <li>• Resetting your password</li>
                                        <li>• Updating profile information</li>
                                        <li>• Account security tips</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Events & Venues --}}
                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-indigo-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white mb-3">Events & Venues</h3>
                                    <ul class="space-y-2 text-gray-400 text-sm">
                                        <li>• Finding event information</li>
                                        <li>• Venue locations & directions</li>
                                        <li>• Event schedule changes</li>
                                        <li>• Age restrictions & requirements</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Refunds & Cancellations --}}
                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white mb-3">Refunds & Cancellations</h3>
                                    <ul class="space-y-2 text-gray-400 text-sm">
                                        <li>• Refund policy overview</li>
                                        <li>• How to request a refund</li>
                                        <li>• Cancellation procedures</li>
                                        <li>• Processing time for refunds</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8 md:p-12">
                    @if(session('success'))
                    <div class="max-w-2xl mx-auto mb-8 p-4 bg-green-500/20 border border-green-500/50 rounded-xl">
                        <p class="text-green-100 font-semibold">{{ session('success') }}</p>
                    </div>
                    @endif
                    <div class="text-center mb-8">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">
                            Still Need Help?
                        </h2>
                        <p class="text-gray-400">
                            Send us a message and we'll get back to you as soon as possible
                        </p>
                    </div>

                    <form action="{{ route('help-center.store') }}" method="POST" class="max-w-2xl mx-auto space-y-6">
                        @csrf
                        @if($errors->any())
                        <div class="p-4 bg-red-500/20 border border-red-500/50 rounded-xl">
                            <ul class="text-red-200 text-sm list-disc list-inside space-y-1">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-white font-semibold mb-2">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all @error('name') border-red-500 @enderror">
                                @error('name')<p class="mt-1 text-red-400 text-sm">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-white font-semibold mb-2">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all @error('email') border-red-500 @enderror">
                                @error('email')<p class="mt-1 text-red-400 text-sm">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-white font-semibold mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required 
                                class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all @error('subject') border-red-500 @enderror">
                            @error('subject')<p class="mt-1 text-red-400 text-sm">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="message" class="block text-white font-semibold mb-2">Message</label>
                            <textarea id="message" name="message" required rows="6" 
                                class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')<p class="mt-1 text-red-400 text-sm">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="w-full px-8 py-4 bg-white text-black font-bold rounded-xl hover:bg-gray-200 transition-all hover:scale-[1.02] shadow-2xl hover:shadow-white/30">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</div>
@endsection
