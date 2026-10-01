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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Privacy Policy
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
                            This Privacy Policy describes how we collect, use, and protect your personal information when you use our platform and services. By using our website and services, you agree to the collection and use of information in accordance with this policy.
                        </p>
                        <div class="bg-purple-500/10 border border-purple-500/20 rounded-2xl p-6">
                            <p class="text-gray-300 leading-relaxed">
                                <strong class="text-white">Your privacy is important to us.</strong> We are committed to protecting your personal data and respecting your privacy rights. Please read this policy carefully to understand how we handle your information.
                            </p>
                        </div>
                    </div>

                    {{-- Information We Collect --}}
                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></span>
                            Information We Collect
                        </h2>

                        <div class="space-y-6">
                            <div class="pl-6 border-l-2 border-purple-500/30">
                                <h3 class="text-xl font-bold text-white mb-3">Personal Information</h3>
                                <p class="text-gray-300 leading-relaxed mb-3">
                                    When you register for an account or make a purchase, we collect:
                                </p>
                                <ul class="space-y-2 text-gray-300">
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-purple-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        <span>Name and contact information (email, phone number)</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-purple-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        <span>Billing and payment information</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-purple-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        <span>Account credentials (username, password)</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-purple-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        <span>Purchase and transaction history</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="pl-6 border-l-2 border-pink-500/30">
                                <h3 class="text-xl font-bold text-white mb-3">Automatically Collected Information</h3>
                                <p class="text-gray-300 leading-relaxed mb-3">
                                    We automatically collect certain information when you visit our website:
                                </p>
                                <ul class="space-y-2 text-gray-300">
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-pink-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        <span>IP address and device information</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-pink-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        <span>Browser type and version</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-pink-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        <span>Pages visited and time spent on our site</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-pink-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                        <span>Referring website addresses</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- How We Use Your Information --}}
                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-pink-500 to-purple-500 rounded-full"></span>
                            How We Use Your Information
                        </h2>

                        <div class="space-y-4 text-gray-300">
                            <p class="leading-relaxed">We use the collected information for the following purposes:</p>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                                    <div class="flex items-start gap-3">
                                        <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-white mb-1">Service Delivery</h4>
                                            <p class="text-sm text-gray-400">Process purchases, deliver tickets, and provide customer support</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                                    <div class="flex items-start gap-3">
                                        <div class="w-10 h-10 bg-pink-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-white mb-1">Communication</h4>
                                            <p class="text-sm text-gray-400">Send order confirmations, updates, and promotional offers</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                                    <div class="flex items-start gap-3">
                                        <div class="w-10 h-10 bg-indigo-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-white mb-1">Improvement</h4>
                                            <p class="text-sm text-gray-400">Enhance our services and user experience</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                                    <div class="flex items-start gap-3">
                                        <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-white mb-1">Security</h4>
                                            <p class="text-sm text-gray-400">Prevent fraud and ensure platform security</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Data Security --}}
                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-indigo-500 to-purple-500 rounded-full"></span>
                            Data Security
                        </h2>

                        <p class="text-gray-300 leading-relaxed mb-6">
                            We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. These measures include:
                        </p>

                        <div class="space-y-3">
                            <div class="flex items-start gap-3 bg-white/5 border border-white/10 rounded-xl p-4">
                                <svg class="w-6 h-6 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-white mb-1">SSL Encryption</h4>
                                    <p class="text-sm text-gray-400">All data transmission is encrypted using industry-standard SSL/TLS protocols</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 bg-white/5 border border-white/10 rounded-xl p-4">
                                <svg class="w-6 h-6 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-white mb-1">Secure Storage</h4>
                                    <p class="text-sm text-gray-400">Personal data is stored on secure servers with restricted access</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 bg-white/5 border border-white/10 rounded-xl p-4">
                                <svg class="w-6 h-6 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-white mb-1">Regular Audits</h4>
                                    <p class="text-sm text-gray-400">We conduct regular security audits and updates to maintain protection</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Your Rights --}}
                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></span>
                            Your Rights
                        </h2>

                        <p class="text-gray-300 leading-relaxed mb-6">
                            You have the following rights regarding your personal information:
                        </p>

                        <div class="space-y-3 text-gray-300">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-purple-400 font-bold text-sm">1</span>
                                </div>
                                <div>
                                    <strong class="text-white">Access:</strong> Request a copy of the personal data we hold about you
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-purple-400 font-bold text-sm">2</span>
                                </div>
                                <div>
                                    <strong class="text-white">Correction:</strong> Request correction of inaccurate or incomplete data
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-purple-400 font-bold text-sm">3</span>
                                </div>
                                <div>
                                    <strong class="text-white">Deletion:</strong> Request deletion of your personal data (subject to legal obligations)
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-purple-400 font-bold text-sm">4</span>
                                </div>
                                <div>
                                    <strong class="text-white">Objection:</strong> Object to processing of your personal data for marketing purposes
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <span class="text-purple-400 font-bold text-sm">5</span>
                                </div>
                                <div>
                                    <strong class="text-white">Portability:</strong> Request transfer of your data to another service provider
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Cookies --}}
                    <div class="mb-10">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                            <span class="w-1.5 h-8 bg-gradient-to-b from-pink-500 to-purple-500 rounded-full"></span>
                            Cookies and Tracking
                        </h2>

                        <p class="text-gray-300 leading-relaxed mb-4">
                            We use cookies and similar tracking technologies to improve your browsing experience and analyze site traffic. For detailed information about our cookie usage, please refer to our <a href="{{ route('cookies') }}" class="text-purple-400 hover:text-purple-300 font-semibold underline">Cookies Policy</a>.
                        </p>
                    </div>

                    {{-- Contact --}}
                    <div class="bg-purple-500/10 border-l-4 border-purple-500 rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-white mb-3">Contact Us</h3>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            If you have any questions about this Privacy Policy or wish to exercise your rights, please contact us at:
                        </p>
                        <div class="space-y-2 text-gray-300">
                            <p><strong class="text-white">Email:</strong> privacy@tiketnonton.com</p>
                            <p><strong class="text-white">Phone:</strong> +62 812-9077-9080</p>
                            <p><strong class="text-white">Address:</strong> JL.Kerinci VIII No.28 Jakarta, 12120. Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</div>
@endsection
