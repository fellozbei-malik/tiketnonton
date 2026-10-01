{{-- Language Switcher Component --}}
<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" 
            class="flex items-center space-x-2 px-3 py-2 rounded-lg border whitespace-nowrap {{ request()->is('myticket*') || request()->is('myorder*') || request()->is('checkout*') || request()->is('payment*') ? 'border-black/30 text-black hover:bg-black/10' : 'border-white/30 text-white hover:bg-white/10' }} transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
        </svg>
        <span class="text-sm font-medium">{{ strtoupper(app()->getLocale()) }}</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    
    <div x-show="open" 
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute right-0 mt-2 w-32 {{ request()->is('myticket*') || request()->is('myorder*') || request()->is('checkout*') || request()->is('payment*') ? 'bg-white/90 border-black/30' : 'bg-black/90 border-white/30' }} backdrop-blur-sm rounded-lg border shadow-lg z-50"
         style="display: none;">
        <div class="py-1">
            <a href="{{ route('language.switch', 'id') }}" 
               class="block px-4 py-2 text-sm {{ request()->is('myticket*') || request()->is('myorder*') || request()->is('checkout*') || request()->is('payment*') ? 'text-black hover:bg-black/10' : 'text-white hover:bg-white/10' }} transition-colors {{ app()->getLocale() === 'id' ? (request()->is('myticket*') || request()->is('myorder*') || request()->is('checkout*') || request()->is('payment*') ? 'bg-black/20' : 'bg-white/20') . ' font-semibold' : '' }}">
                <div class="flex items-center space-x-2">
                    <span>🇮🇩</span>
                    <span>&nbsp;Indonesia</span>
                </div>
            </a>
            <a href="{{ route('language.switch', 'en') }}" 
               class="block px-4 py-2 text-sm {{ request()->is('myticket*') || request()->is('myorder*') || request()->is('checkout*') || request()->is('payment*') ? 'text-black hover:bg-black/10' : 'text-white hover:bg-white/10' }} transition-colors {{ app()->getLocale() === 'en' ? (request()->is('myticket*') || request()->is('myorder*') || request()->is('checkout*') || request()->is('payment*') ? 'bg-black/20' : 'bg-white/20') . ' font-semibold' : '' }}">
                <div class="flex items-center space-x-2">
                    <span>🇬🇧</span>
                    <span>&nbsp;English</span>
                </div>
            </a>
        </div>
    </div>
</div>
