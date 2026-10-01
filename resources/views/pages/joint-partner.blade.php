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
                    Join as Partner
                </h1>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    Untuk para sobat Tiketnonton.com yang ingin berpartner soal Event Show
                </p>
            </div>
        </div>
    </section>

    {{-- Form Section --}}
    <section class="py-16 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto">
                {{-- Success Message --}}
                @if(session('success'))
                <div class="mb-6 bg-green-500/20 border border-green-500/50 rounded-2xl p-6 backdrop-blur-sm">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-green-100 font-semibold">{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                {{-- Error Messages --}}
                @if($errors->any())
                <div class="mb-6 bg-red-500/20 border border-red-500/50 rounded-2xl p-6 backdrop-blur-sm">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-red-100 font-semibold mb-2">Please fix the following errors:</p>
                            <ul class="list-disc list-inside text-red-200 text-sm space-y-1">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                <div class="bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 p-8 md:p-12">

                    <form action="{{ route('joint-partner.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Nama Perusahaan --}}
                        <div>
                            <label for="company_name" class="block text-white font-semibold mb-3">
                                Nama Perusahaan Penyelenggara <span class="text-red-400">*</span>
                            </label>
                            <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" required placeholder="E.g. John Doe" class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all @error('company_name') border-red-500 @enderror">
                            @error('company_name')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Alamat Perusahaan --}}
                        <div>
                            <label for="company_address" class="block text-white font-semibold mb-3">
                                Alamat Perusahaan <span class="text-red-400">*</span>
                            </label>
                            <input type="text" id="company_address" name="company_address" value="{{ old('company_address') }}" required placeholder="E.g. Jakarta" class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all @error('company_address') border-red-500 @enderror">
                            @error('company_address')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nama Event --}}
                        <div>
                            <label for="event_name" class="block text-white font-semibold mb-3">
                                NAMA EVENT <span class="text-red-400">*</span>
                            </label>
                            <input type="text" id="event_name" name="event_name" value="{{ old('event_name') }}" required placeholder="E.g. konser" class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all @error('event_name') border-red-500 @enderror">
                            @error('event_name')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal Event & Tempat --}}
                        <div>
                            <label for="event_date_location" class="block text-white font-semibold mb-3">
                                Tanggal Event & Tempat <span class="text-red-400">*</span>
                            </label>
                            <input type="text" id="event_date_location" name="event_date_location" value="{{ old('event_date_location') }}" required placeholder="E.g. 15 Maret 2024 - Jakarta Convention Center" class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all @error('event_date_location') border-red-500 @enderror">
                            @error('event_date_location')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nama Pemohon --}}
                        <div>
                            <label for="applicant_name" class="block text-white font-semibold mb-3">
                                Nama Pemohon <span class="text-red-400">*</span>
                            </label>
                            <input type="text" id="applicant_name" name="applicant_name" value="{{ old('applicant_name') }}" required placeholder="Your full name" class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all @error('applicant_name') border-red-500 @enderror">
                            @error('applicant_name')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- NO Telphon Selular (WA) --}}
                        <div>
                            <label for="phone" class="block text-white font-semibold mb-3">
                                NO Telphon Selular (WA) <span class="text-red-400">*</span>
                            </label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="E.g. +62 300 400 5000" maxlength="16" class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all @error('phone') border-red-500 @enderror">
                            @error('phone')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @else
                            <p class="text-gray-500 text-sm mt-2">0 / 16</p>
                            @enderror
                        </div>

                        {{-- Alamat E-mail --}}
                        <div>
                            <label for="email" class="block text-white font-semibold mb-3">
                                Alamat E-mail <span class="text-red-400">*</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="E.g. john@doe.com" class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all @error('email') border-red-500 @enderror">
                            @error('email')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Pesan --}}
                        <div>
                            <label for="message" class="block text-white font-semibold mb-3">
                                Pesan <span class="text-red-400">*</span>
                            </label>
                            <textarea id="message" name="message" required rows="6" placeholder="Tuliskan pesan Anda..." class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 focus:outline-none transition-all resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-4">
                            <button type="submit" class="w-full px-8 py-5 bg-white text-black font-bold rounded-xl hover:bg-gray-200 transition-all hover:scale-[1.02] shadow-2xl hover:shadow-white/30 text-lg">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    Kirim Permohonan
                                </span>
                            </button>
                        </div>

                        {{-- Info Note --}}
                        <div class="bg-purple-500/10 border border-purple-500/20 rounded-2xl p-6">
                            <div class="flex items-start gap-4">
                                <svg class="w-6 h-6 text-purple-400 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="text-white font-bold mb-2">Informasi</h3>
                                    <p class="text-gray-300 text-sm leading-relaxed">
                                        Tim kami akan menghubungi Anda dalam 1-2 hari kerja setelah menerima permohonan partnership ini. Pastikan data yang Anda berikan sudah benar dan lengkap.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <x-footer />
</div>
@endsection
