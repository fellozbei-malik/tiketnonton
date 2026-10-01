{{-- Splash Screen dengan Logo Animasi --}}
<div id="splash-screen" class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 transition-opacity duration-500">
    <div class="flex flex-col items-center justify-center">
        {{-- Logo dengan animasi --}}
        <div class="splash-logo-container">
            <img src="{{ asset('storage/images/logo.png') }}" 
                 alt="Tiketnonton.com" 
                 class="splash-logo h-20 w-auto">
        </div>
        
        {{-- Loading dots --}}
        <div class="mt-8">
            <div class="flex space-x-2">
                <div class="loading-dot w-3 h-3 bg-white rounded-full" style="animation-delay: 0s;"></div>
                <div class="loading-dot w-3 h-3 bg-white rounded-full" style="animation-delay: 0.2s;"></div>
                <div class="loading-dot w-3 h-3 bg-white rounded-full" style="animation-delay: 0.4s;"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .splash-logo-container {
        animation: logoFloat 3s ease-in-out infinite;
    }
    
    .splash-logo {
        animation: logoScale 2s ease-in-out infinite;
        filter: drop-shadow(0 15px 30px rgba(255, 255, 255, 0.2));
    }
    
    .loading-dot {
        animation: dotBounce 1.4s ease-in-out infinite;
    }
    
    @keyframes logoFloat {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        25% {
            transform: translateY(-15px) rotate(2deg);
        }
        50% {
            transform: translateY(-10px) rotate(0deg);
        }
        75% {
            transform: translateY(-15px) rotate(-2deg);
        }
    }
    
    @keyframes logoScale {
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.08);
            opacity: 0.9;
        }
    }
    
    @keyframes dotBounce {
        0%, 80%, 100% {
            transform: scale(0.8);
            opacity: 0.5;
        }
        40% {
            transform: scale(1.2);
            opacity: 1;
        }
    }
    
    #splash-screen.fade-out {
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.5s ease-out;
    }
</style>

<script>
    function hideSplashScreen() {
        const splashScreen = document.getElementById('splash-screen');
        if (splashScreen && !splashScreen.classList.contains('fade-out')) {
            splashScreen.classList.add('fade-out');
            setTimeout(function() {
                if (splashScreen && splashScreen.parentNode) {
                    splashScreen.remove();
                }
            }, 500);
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Tunggu sampai semua asset dan view selesai load
        if (document.readyState === 'complete') {
            setTimeout(hideSplashScreen, 300);
        } else {
            window.addEventListener('load', function() {
                setTimeout(hideSplashScreen, 300);
            });
        }
        
        // Fallback: jika load terlalu lama, sembunyikan setelah 3 detik
        setTimeout(hideSplashScreen, 3000);
    });
    
    // Handle Livewire navigation (jika menggunakan Livewire)
    document.addEventListener('livewire:navigated', function() {
        // Splash screen sudah dihapus, tidak perlu ditampilkan lagi
    });
</script>
