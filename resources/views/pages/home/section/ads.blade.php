<section class="relative py-32 overflow-hidden bg-black">
    {{-- Subtle texture overlay --}}
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    {{-- Content --}}
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-5xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Left Side - Text Content --}}
                <div class="text-white space-y-6">
                    {{-- Heading --}}
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight">
                        <span class="block text-white drop-shadow-2xl">
                            Promote Your
                        </span>
                        <span class="block mt-2 text-white drop-shadow-2xl">
                            Amazing Events
                        </span>
                    </h2>

                    {{-- Description --}}
                    <p class="text-lg md:text-xl text-gray-300 max-w-xl leading-relaxed drop-shadow-lg">
                        Reach thousands of potential attendees and grow your event with our premium platform.
                        <span class="font-bold text-white">Let's make it happen together!</span>
                    </p>

                    {{-- CTA Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#contact" class="group relative px-8 py-4 bg-white text-black font-bold rounded-full overflow-hidden transition-all hover:scale-105 shadow-2xl hover:shadow-white/30 text-center">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                Get Started Now
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </span>
                        </a>
                        <a href="#info" class="group px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-black transition-all hover:scale-105 shadow-xl text-center">
                            <span class="flex items-center justify-center gap-2">
                                Learn More
                                <svg class="w-5 h-5 group-hover:rotate-45 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>

                {{-- Right Side - Features --}}
                <div class="grid gap-4">
                    <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-white/20 transition-all group">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-white/10 rounded-xl group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white mb-1 drop-shadow-lg">Wide Reach</h3>
                                <p class="text-gray-400 text-sm drop-shadow">Connect with thousands of potential attendees</p>
                            </div>
                        </div>
                    </div>

                    <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-white/20 transition-all group">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-white/10 rounded-xl group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white mb-1 drop-shadow-lg">Analytics</h3>
                                <p class="text-gray-400 text-sm drop-shadow">Track performance with detailed insights</p>
                            </div>
                        </div>
                    </div>

                    <div class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-white/20 transition-all group">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-white/10 rounded-xl group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white mb-1 drop-shadow-lg">Fast Setup</h3>
                                <p class="text-gray-400 text-sm drop-shadow">Get your event live in minutes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
