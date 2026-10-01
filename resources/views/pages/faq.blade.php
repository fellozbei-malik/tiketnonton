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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Frequently Asked Questions
                </h1>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    Find answers to the most common questions about our services
                </p>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-16 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                
                {{-- General Questions --}}
                <div class="mb-12">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                        <span class="w-2 h-8 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></span>
                        General Questions
                    </h2>

                    <div class="space-y-4">
                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">What is this platform about?</h3>
                                    <svg class="w-6 h-6 text-purple-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    We are a comprehensive entertainment management platform specializing in ticketing, event management, and production services. We connect event organizers with audiences, making it easy to discover, purchase, and enjoy premium entertainment experiences.
                                </div>
                            </details>
                        </div>

                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">How do I create an account?</h3>
                                    <svg class="w-6 h-6 text-purple-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    Click the "Register" button in the top navigation, fill out your details including name, email, and password. You'll receive a confirmation email to verify your account. Once verified, you can start browsing and purchasing tickets.
                                </div>
                            </details>
                        </div>

                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">Is my personal information secure?</h3>
                                    <svg class="w-6 h-6 text-purple-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    Yes, we take data security seriously. All personal information is encrypted and stored securely. We comply with industry-standard security protocols and never share your information with third parties without your consent. For more details, please read our Privacy Policy.
                                </div>
                            </details>
                        </div>
                    </div>
                </div>

                {{-- Tickets & Purchases --}}
                <div class="mb-12">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                        <span class="w-2 h-8 bg-gradient-to-b from-pink-500 to-purple-500 rounded-full"></span>
                        Tickets & Purchases
                    </h2>

                    <div class="space-y-4">
                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">How do I purchase tickets?</h3>
                                    <svg class="w-6 h-6 text-pink-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    Browse events, select your preferred event, choose your tickets and quantity, proceed to checkout, and complete payment. You'll receive an e-ticket via email which you can present at the venue.
                                </div>
                            </details>
                        </div>

                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">What payment methods do you accept?</h3>
                                    <svg class="w-6 h-6 text-pink-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    We accept various payment methods including credit/debit cards (Visa, Mastercard), bank transfers, e-wallets (GoPay, OVO, Dana), and virtual accounts from major Indonesian banks.
                                </div>
                            </details>
                        </div>

                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">Can I cancel or refund my ticket?</h3>
                                    <svg class="w-6 h-6 text-pink-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    Refund policies vary by event. Generally, tickets are non-refundable unless the event is cancelled or rescheduled. Please check the specific event's terms and conditions before purchasing. If eligible, refund requests can be submitted through your account dashboard.
                                </div>
                            </details>
                        </div>

                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">How do I receive my tickets?</h3>
                                    <svg class="w-6 h-6 text-pink-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    After successful payment, you'll receive an e-ticket via email and it will also be available in your "My Tickets" section. You can show the digital ticket (QR code) on your phone at the venue, or download and print it.
                                </div>
                            </details>
                        </div>
                    </div>
                </div>

                {{-- Events & Attendance --}}
                <div class="mb-12">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                        <span class="w-2 h-8 bg-gradient-to-b from-indigo-500 to-purple-500 rounded-full"></span>
                        Events & Attendance
                    </h2>

                    <div class="space-y-4">
                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">What should I bring to the event?</h3>
                                    <svg class="w-6 h-6 text-indigo-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    Bring your e-ticket (digital or printed), valid photo ID matching the ticket holder's name, and the credit card used for purchase (if applicable). Check the specific event page for any additional requirements or prohibited items.
                                </div>
                            </details>
                        </div>

                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">What if the event is cancelled or postponed?</h3>
                                    <svg class="w-6 h-6 text-indigo-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    If an event is cancelled, you will receive a full refund automatically. If postponed, your ticket remains valid for the new date. You'll be notified via email and SMS about any changes. If you can't attend the new date, you may request a refund within the specified timeframe.
                                </div>
                            </details>
                        </div>

                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">Can I transfer my ticket to someone else?</h3>
                                    <svg class="w-6 h-6 text-indigo-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    Some events allow ticket transfers. Check the event details page for transfer policies. If transfers are allowed, you can initiate a transfer through your account dashboard. Both parties will need to confirm the transfer, and there may be a transfer fee.
                                </div>
                            </details>
                        </div>
                    </div>
                </div>

                {{-- Technical Support --}}
                <div class="mb-12">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6 flex items-center gap-3">
                        <span class="w-2 h-8 bg-gradient-to-b from-purple-500 to-indigo-500 rounded-full"></span>
                        Technical Support
                    </h2>

                    <div class="space-y-4">
                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">I didn't receive my confirmation email</h3>
                                    <svg class="w-6 h-6 text-purple-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    First, check your spam/junk folder. If you still don't see it, log into your account and navigate to "My Tickets" - your tickets will be there. You can also request a resend from your account settings or contact our support team.
                                </div>
                            </details>
                        </div>

                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">My payment failed but money was deducted</h3>
                                    <svg class="w-6 h-6 text-purple-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    This is usually a temporary authorization hold. The amount will be refunded to your account within 3-7 business days. If you don't receive a refund after this period, please contact our support team with your transaction details.
                                </div>
                            </details>
                        </div>

                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center cursor-pointer p-6 hover:bg-white/5 transition-all">
                                    <h3 class="text-lg font-bold text-white pr-4">How do I reset my password?</h3>
                                    <svg class="w-6 h-6 text-purple-400 transform group-open:rotate-180 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </summary>
                                <div class="px-6 pb-6 text-gray-300 leading-relaxed">
                                    Click "Forgot Password" on the login page, enter your registered email address, and you'll receive a password reset link. Click the link in the email and follow the instructions to create a new password.
                                </div>
                            </details>
                        </div>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="bg-gradient-to-br from-purple-500/20 to-pink-500/20 border border-purple-500/30 rounded-2xl p-8 text-center">
                    <h3 class="text-2xl font-bold text-white mb-4">Still have questions?</h3>
                    <p class="text-gray-300 mb-6">Our support team is here to help you</p>
                    <a href="{{ route('help-center') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-black font-bold rounded-full hover:bg-gray-200 transition-all hover:scale-105 shadow-2xl hover:shadow-white/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</div>
@endsection
