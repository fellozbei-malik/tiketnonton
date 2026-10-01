@extends('layouts.app')

@section('content')
<main class="relative min-h-screen overflow-hidden">
    {{-- Background with Gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900">
        {{-- Animated Blobs --}}
        <div class="absolute top-20 left-20 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/2 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

        {{-- Grid Pattern --}}
        <div class="absolute inset-0 opacity-5" style="background-image: linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px;"></div>
    </div>

    <x-navbar />

    {{-- Main Content --}}
    <div class="relative min-h-screen flex items-center justify-center p-4 pt-28">
        <div class="w-full max-w-6xl">
            <div class="grid lg:grid-cols-2 gap-0 bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white/20">

                {{-- Left Side - Premium Info Panel --}}
                <div class="hidden lg:flex relative bg-gradient-to-br from-slate-900 via-purple-900 to-pink-900 p-12 flex-col justify-between overflow-hidden">
                    {{-- Decorative Elements --}}
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-purple-500 rounded-full filter blur-3xl"></div>
                        <div class="absolute bottom-0 left-0 w-64 h-64 bg-pink-500 rounded-full filter blur-3xl"></div>
                    </div>

                    {{-- Floating Icons --}}
                    <div class="absolute top-10 right-10 w-20 h-20 border border-white/10 rounded-full animate-float-slow"></div>
                    <div class="absolute bottom-20 left-10 w-16 h-16 border border-white/10 rounded-lg rotate-45 animate-float-slower"></div>

                    <div class="relative z-10">
                        {{-- Logo --}}
                        <div class="flex items-center gap-3 mb-12">
                            <div class="p-3 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                                <svg class="h-8 w-8 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                </svg>
                            </div>
                            <span class="text-2xl font-extrabold text-white">TicketNonton</span>
                        </div>

                        {{-- Content --}}
                        <div>
                            <h1 class="text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-6">
                                Welcome Back to
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-300 to-pink-300">Premium Events</span>
                            </h1>
                            <p class="text-lg text-slate-300 leading-relaxed mb-8">
                                Access your exclusive account to discover amazing events, book premium tickets, and experience unforgettable moments.
                            </p>
                        </div>
                    </div>

                    {{-- Features --}}
                    <div class="relative z-10 space-y-4">
                        <div class="flex items-center gap-3 text-white">
                            <div class="p-2 bg-white/10 rounded-lg backdrop-blur-sm">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-sm">Exclusive event access</span>
                        </div>
                        <div class="flex items-center gap-3 text-white">
                            <div class="p-2 bg-white/10 rounded-lg backdrop-blur-sm">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-sm">Instant e-ticket delivery</span>
                        </div>
                        <div class="flex items-center gap-3 text-white">
                            <div class="p-2 bg-white/10 rounded-lg backdrop-blur-sm">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-sm">Secure payment & support</span>
                        </div>
                    </div>
                </div>

                {{-- Right Side - Login Form --}}
                <div class="p-8 md:p-12 lg:p-16 flex flex-col justify-center">
                    <div class="w-full max-w-md mx-auto">
                        {{-- Header --}}
                        <div class="text-center mb-10">
                            <div class="inline-flex items-center gap-2 py-2 px-4 rounded-full bg-purple-50 text-purple-600 text-sm font-bold uppercase tracking-wide mb-4">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                                Welcome Back
                            </div>
                            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3">
                                Sign In
                            </h2>
                            <p class="text-slate-600">Access your account to continue</p>
                        </div>

                        {{-- Form --}}
                        <form action="{{ route('loginAccount') }}" method="POST" class="space-y-6">
                            @csrf

                            {{-- Email Input --}}
                            <div>
                                <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="block w-full pl-12 pr-4 py-3.5 border-2 border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-slate-900 placeholder-slate-400" placeholder="your@email.com">
                                </div>
                                @error('email')
                                <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            {{-- Password Input --}}
                            <div>
                                <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" name="password" id="password" class="block w-full pl-12 pr-4 py-3.5 border-2 border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-slate-900 placeholder-slate-400" placeholder="••••••••">
                                </div>
                                @error('password')
                                <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            {{-- Remember & Forgot --}}
                            <div class="flex items-center justify-between">
                                <label class="flex items-center cursor-pointer group">
                                    <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-slate-300 rounded cursor-pointer">
                                    <span class="ml-2 text-sm text-slate-700 group-hover:text-slate-900">Remember me</span>
                                </label>
                                <a href="#" class="text-sm font-semibold text-purple-600 hover:text-purple-700 transition-colors">
                                    Forgot Password?
                                </a>
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="group relative w-full flex items-center justify-center gap-2 py-4 px-6 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold shadow-lg hover:shadow-xl hover:shadow-purple-500/50 transform hover:scale-[1.02] transition-all duration-300 overflow-hidden">
                                <span class="relative z-10 flex items-center gap-2">
                                    Sign In
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </button>
                        </form>

                        {{-- Divider --}}
                        <div class="relative my-8">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t-2 border-slate-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-slate-500 font-semibold">Or continue with</span>
                            </div>
                        </div>

                        {{-- Social Login --}}
                        <div class="grid grid-cols-3 gap-3">
                            <button type="button" class="flex items-center justify-center p-3 rounded-xl border-2 border-slate-200 hover:border-purple-300 hover:bg-purple-50 transition-all group">
                                <img src="{{ Storage::url('icon/google.svg') }}" alt="Google" class="h-6 w-6 group-hover:scale-110 transition-transform">
                            </button>
                            <button type="button" class="flex items-center justify-center p-3 rounded-xl border-2 border-slate-200 hover:border-purple-300 hover:bg-purple-50 transition-all group">
                                <img src="{{ Storage::url('icon/facebook.svg') }}" alt="Facebook" class="h-6 w-6 group-hover:scale-110 transition-transform">
                            </button>
                            <button type="button" class="flex items-center justify-center p-3 rounded-xl border-2 border-slate-200 hover:border-purple-300 hover:bg-purple-50 transition-all group">
                                <img src="{{ Storage::url('icon/apple.svg') }}" alt="Apple" class="h-6 w-6 group-hover:scale-110 transition-transform">
                            </button>
                        </div>

                        {{-- Sign Up Link --}}
                        <div class="mt-8 text-center">
                            <p class="text-slate-600">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="font-bold text-purple-600 hover:text-purple-700 transition-colors">
                                    Create Account
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    @keyframes blob {

        0%,
        100% {
            transform: translate(0px, 0px) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
    }

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

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animate-float-slow {
        animation: float-slow 6s ease-in-out infinite;
    }

    .animate-float-slower {
        animation: float-slower 8s ease-in-out infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

</style>
@endsection
