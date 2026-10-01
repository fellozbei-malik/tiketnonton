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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Cookies Policy
                </h1>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    Last updated: January 2026
                </p>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-16 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-8 md:p-12">

                    {{-- Introduction --}}
                    <div class="mb-12">
                        <p class="text-gray-300 leading-relaxed mb-6">
                            This Cookies Policy explains how we use cookies and similar technologies when you visit our website. It describes what these technologies are, why we use them, and your choices regarding their use.
                        </p>
                        <div class="bg-indigo-500/10 border border-indigo-500/20 rounded-2xl p-6">
                            <p class="text-gray-300 leading-relaxed">
                                <strong class="text-white">What are Cookies?</strong> Cookies are small text files that are placed on your device when you visit a website. They help the website remember your preferences and improve your browsing experience.
                            </p>
                        </div>
                    </div>

                    {{-- Types of Cookies --}}
                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></span>
                            Types of Cookies We Use
                        </h2>

                        <div class="space-y-6">
                            {{-- Essential Cookies --}}
                            <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                                <div class="flex items-start gap-4 mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white mb-2">Essential Cookies</h3>
                                        <span class="inline-block px-3 py-1 bg-purple-500/20 text-purple-300 text-xs font-semibold rounded-full mb-3">Required</span>
                                    </div>
                                </div>
                                <p class="text-gray-300 leading-relaxed mb-3">
                                    These cookies are necessary for the website to function properly. They enable core functionality such as security, authentication, and session management.
                                </p>
                                <div class="bg-black/30 rounded-xl p-4">
                                    <p class="text-sm text-gray-400"><strong class="text-white">Examples:</strong> Login session, shopping cart, security tokens</p>
                                    <p class="text-sm text-gray-400 mt-2"><strong class="text-white">Duration:</strong> Session or up to 12 months</p>
                                </div>
                            </div>

                            {{-- Performance Cookies --}}
                            <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                                <div class="flex items-start gap-4 mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-purple-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white mb-2">Performance Cookies</h3>
                                        <span class="inline-block px-3 py-1 bg-pink-500/20 text-pink-300 text-xs font-semibold rounded-full mb-3">Analytics</span>
                                    </div>
                                </div>
                                <p class="text-gray-300 leading-relaxed mb-3">
                                    These cookies help us understand how visitors interact with our website by collecting and reporting information anonymously. This helps us improve website performance.
                                </p>
                                <div class="bg-black/30 rounded-xl p-4">
                                    <p class="text-sm text-gray-400"><strong class="text-white">Examples:</strong> Google Analytics, page views, click patterns</p>
                                    <p class="text-sm text-gray-400 mt-2"><strong class="text-white">Duration:</strong> Up to 24 months</p>
                                </div>
                            </div>

                            {{-- Functionality Cookies --}}
                            <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                                <div class="flex items-start gap-4 mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white mb-2">Functionality Cookies</h3>
                                        <span class="inline-block px-3 py-1 bg-indigo-500/20 text-indigo-300 text-xs font-semibold rounded-full mb-3">Personalization</span>
                                    </div>
                                </div>
                                <p class="text-gray-300 leading-relaxed mb-3">
                                    These cookies allow the website to remember choices you make (such as language or region) and provide enhanced, more personalized features.
                                </p>
                                <div class="bg-black/30 rounded-xl p-4">
                                    <p class="text-sm text-gray-400"><strong class="text-white">Examples:</strong> Language preference, location settings, theme selection</p>
                                    <p class="text-sm text-gray-400 mt-2"><strong class="text-white">Duration:</strong> Up to 12 months</p>
                                </div>
                            </div>

                            {{-- Marketing Cookies --}}
                            <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                                <div class="flex items-start gap-4 mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white mb-2">Marketing Cookies</h3>
                                        <span class="inline-block px-3 py-1 bg-purple-500/20 text-purple-300 text-xs font-semibold rounded-full mb-3">Optional</span>
                                    </div>
                                </div>
                                <p class="text-gray-300 leading-relaxed mb-3">
                                    These cookies track your online activity to help advertisers deliver more relevant advertising or limit how many times you see an ad.
                                </p>
                                <div class="bg-black/30 rounded-xl p-4">
                                    <p class="text-sm text-gray-400"><strong class="text-white">Examples:</strong> Facebook Pixel, Google Ads, remarketing tags</p>
                                    <p class="text-sm text-gray-400 mt-2"><strong class="text-white">Duration:</strong> Up to 24 months</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Third-Party Cookies --}}
                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-pink-500 to-purple-500 rounded-full"></span>
                            Third-Party Cookies
                        </h2>

                        <p class="text-gray-300 leading-relaxed mb-6">
                            We may use third-party services that also set cookies on your device. These third parties have their own privacy policies:
                        </p>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                                <h4 class="font-bold text-white mb-2">Google Analytics</h4>
                                <p class="text-sm text-gray-400 mb-3">Used for website analytics and performance tracking</p>
                                <a href="https://policies.google.com/privacy" target="_blank" class="text-purple-400 hover:text-purple-300 text-sm font-semibold">
                                    View Privacy Policy →
                                </a>
                            </div>

                            <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                                <h4 class="font-bold text-white mb-2">Payment Providers</h4>
                                <p class="text-sm text-gray-400 mb-3">Used for secure payment processing</p>
                                <p class="text-sm text-gray-400">Midtrans, Stripe, etc.</p>
                            </div>

                            <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                                <h4 class="font-bold text-white mb-2">Social Media Platforms</h4>
                                <p class="text-sm text-gray-400 mb-3">For social sharing and login features</p>
                                <p class="text-sm text-gray-400">Facebook, Instagram, Twitter</p>
                            </div>

                            <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                                <h4 class="font-bold text-white mb-2">Advertising Networks</h4>
                                <p class="text-sm text-gray-400 mb-3">For targeted advertising campaigns</p>
                                <p class="text-sm text-gray-400">Google Ads, Facebook Ads</p>
                            </div>
                        </div>
                    </div>

                    {{-- Managing Cookies --}}
                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-indigo-500 to-purple-500 rounded-full"></span>
                            Managing Your Cookie Preferences
                        </h2>

                        <p class="text-gray-300 leading-relaxed mb-6">
                            You have several options to manage cookies:
                        </p>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4 bg-white/5 border border-white/10 rounded-xl p-5">
                                <div class="w-10 h-10 bg-indigo-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-indigo-400 font-bold">1</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-2">Browser Settings</h4>
                                    <p class="text-gray-300 text-sm leading-relaxed">
                                        Most web browsers allow you to control cookies through their settings. You can set your browser to refuse cookies or delete certain cookies. However, this may impact your experience on our website.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 bg-white/5 border border-white/10 rounded-xl p-5">
                                <div class="w-10 h-10 bg-indigo-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-indigo-400 font-bold">2</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-2">Cookie Consent Tool</h4>
                                    <p class="text-gray-300 text-sm leading-relaxed">
                                        When you first visit our website, you'll see a cookie consent banner. You can manage your preferences there and change them at any time through your account settings.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 bg-white/5 border border-white/10 rounded-xl p-5">
                                <div class="w-10 h-10 bg-indigo-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-indigo-400 font-bold">3</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-2">Opt-Out Options</h4>
                                    <p class="text-gray-300 text-sm leading-relaxed mb-3">
                                        You can opt out of targeted advertising by visiting these resources:
                                    </p>
                                    <ul class="space-y-1 text-sm">
                                        <li><a href="http://optout.aboutads.info/" target="_blank" class="text-purple-400 hover:text-purple-300">Digital Advertising Alliance</a></li>
                                        <li><a href="http://optout.networkadvertising.org/" target="_blank" class="text-purple-400 hover:text-purple-300">Network Advertising Initiative</a></li>
                                        <li><a href="https://tools.google.com/dlpage/gaoptout" target="_blank" class="text-purple-400 hover:text-purple-300">Google Analytics Opt-out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Browser Instructions --}}
                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></span>
                            Browser-Specific Instructions
                        </h2>

                        <p class="text-gray-300 leading-relaxed mb-6">
                            For detailed instructions on managing cookies in specific browsers:
                        </p>

                        <div class="grid md:grid-cols-2 gap-3">
                            <a href="https://support.google.com/chrome/answer/95647" target="_blank" class="flex items-center gap-3 bg-white/5 border border-white/10 rounded-xl p-4 hover:border-purple-500/50 transition-all">
                                <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm.75 5h1.5A6.75 6.75 0 0121 11.75a6.75 6.75 0 01-6.75 6.75v-1.5a5.25 5.25 0 10-5.25-5.25H7.5A6.75 6.75 0 0112.75 5z" />
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-white text-sm">Google Chrome</h4>
                                    <p class="text-xs text-gray-400">Manage cookies →</p>
                                </div>
                            </a>

                            <a href="https://support.mozilla.org/en-US/kb/cookies-information-websites-store-on-your-computer" target="_blank" class="flex items-center gap-3 bg-white/5 border border-white/10 rounded-xl p-4 hover:border-purple-500/50 transition-all">
                                <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0z" />
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-white text-sm">Mozilla Firefox</h4>
                                    <p class="text-xs text-gray-400">Manage cookies →</p>
                                </div>
                            </a>

                            <a href="https://support.apple.com/guide/safari/manage-cookies-sfri11471/mac" target="_blank" class="flex items-center gap-3 bg-white/5 border border-white/10 rounded-xl p-4 hover:border-purple-500/50 transition-all">
                                <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0z" />
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-white text-sm">Safari</h4>
                                    <p class="text-xs text-gray-400">Manage cookies →</p>
                                </div>
                            </a>

                            <a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" class="flex items-center gap-3 bg-white/5 border border-white/10 rounded-xl p-4 hover:border-purple-500/50 transition-all">
                                <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0z" />
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-white text-sm">Microsoft Edge</h4>
                                    <p class="text-xs text-gray-400">Manage cookies →</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- Updates --}}
                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-pink-500 to-purple-500 rounded-full"></span>
                            Updates to This Policy
                        </h2>

                        <p class="text-gray-300 leading-relaxed">
                            We may update this Cookies Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. The "Last Updated" date at the top of this policy indicates when it was last revised. We encourage you to review this policy periodically.
                        </p>
                    </div>

                    {{-- Contact --}}
                    <div class="bg-indigo-500/10 border-l-4 border-indigo-500 rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-white mb-3">Questions About Cookies?</h3>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            If you have any questions about our use of cookies, please contact us:
                        </p>
                        <div class="space-y-2 text-gray-300">
                            <p><strong class="text-white">Email:</strong> tiketnonton@gmail.com</p>
                            <p><strong class="text-white">Phone:</strong> +62 812-9077-9080</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</div>
@endsection
