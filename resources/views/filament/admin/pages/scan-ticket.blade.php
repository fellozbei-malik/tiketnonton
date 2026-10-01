<x-filament-panels::page>
    {{-- Expose Livewire $wire for camera callback (must be in component scope) --}}
    <div x-data x-init="window.scanTicketWire = $wire" style="display: none"></div>

    {{-- Camera scan section --}}
    <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mb-6">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-950 dark:text-white mb-2">
                {{ __('common.scan_with_camera') }}
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                {{ __('common.scan_camera_hint') }}
            </p>
            <div class="flex flex-wrap gap-3 items-start">
                <button type="button" id="btn-start-camera"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold bg-primary-600 text-white hover:bg-primary-500 focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H20a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V9z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.82 4a4 4 0 00-2.12-1.16 48 48 0 00-11.4 0A4 4 0 004.18 4"></path>
                    </svg>
                    {{ __('common.start_camera') }}
                </button>
                <button type="button" id="btn-stop-camera" disabled
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold bg-gray-200 text-gray-600 hover:bg-gray-300 focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-900 disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path>
                    </svg>
                    {{ __('common.stop_camera') }}
                </button>
            </div>
            <div id="camera-reader-wrap" class="mt-4 hidden">
                <div id="reader" class="max-w-md rounded-xl overflow-hidden border-2 border-gray-200 dark:border-gray-700"></div>
                <p id="camera-status" class="mt-2 text-sm text-gray-500 dark:text-gray-400"></p>
            </div>
        </div>
    </div>

    {{-- Manual form --}}
    <x-filament-panels::form id="form" wire:submit="lookupTicket">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>

    {{-- Detail tiket (setelah scan/cari, sebelum approve) --}}
    @if($previewOrderItem = $this->previewOrderItem)
    <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mt-6 overflow-hidden">
        <div class="p-6 border-b border-gray-200 dark:border-white/10">
            <h3 class="text-lg font-semibold text-gray-950 dark:text-white">
                {{ __('common.ticket_detail') }}
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                {{ __('common.ticket_detail_subtitle') }}
            </p>
        </div>
        <div class="p-6 space-y-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">{{ __('common.ticket_code') }}</p>
                    <p class="mt-1 font-mono font-bold text-gray-950 dark:text-white">{{ $previewOrderItem->ticket_code }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">{{ __('common.event') }}</p>
                    <p class="mt-1 font-semibold text-gray-950 dark:text-white">{{ $previewOrderItem->event?->name ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">{{ __('common.attendee_name') }}</p>
                    <p class="mt-1 text-gray-950 dark:text-white">{{ $previewOrderItem->attendee_name }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">{{ __('common.ticket_type') }}</p>
                    <p class="mt-1 text-gray-950 dark:text-white">{{ $previewOrderItem->ticket?->name ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">{{ __('common.order_code') }}</p>
                    <p class="mt-1 font-mono text-gray-950 dark:text-white">{{ $previewOrderItem->order?->transaction_code ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">{{ __('common.price') }}</p>
                    <p class="mt-1 font-semibold text-gray-950 dark:text-white">Rp {{ number_format($previewOrderItem->price ?? 0, 0, ',', '.') }}</p>
                </div>
            </div>
            @if($previewOrderItem->attendee)
            <div class="pt-4 border-t border-gray-200 dark:border-white/10">
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 mb-2">{{ __('common.attendee_info') }}</p>
                <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <li><span class="text-gray-500 dark:text-gray-400">{{ __('common.email') }}:</span> {{ $previewOrderItem->attendee->email ?? '-' }}</li>
                    <li><span class="text-gray-500 dark:text-gray-400">{{ __('common.phone') }}:</span> {{ $previewOrderItem->attendee->phone_number ?? '-' }}</li>
                </ul>
            </div>
            @endif
            <div class="flex flex-wrap gap-3 pt-4">
                <button type="button" wire:click="approvePreview"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-white text-sm font-bold bg-success-600 bg-green hover:bg-success-500 focus:ring-2 focus:ring-success-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900" style="background-color: #049347;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ __('common.approve_ticket') }}
                </button>
                <button type="button" wire:click="clearPreview"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    {{ __('common.cancel') }}
                </button>
            </div>
        </div>
    </div>
    @endif

    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
    <script>
        (function() {
            var readerWrap = document.getElementById('camera-reader-wrap');
            var readerEl = document.getElementById('reader');
            var btnStart = document.getElementById('btn-start-camera');
            var btnStop = document.getElementById('btn-stop-camera');
            var statusEl = document.getElementById('camera-status');
            var html5QrCode = null;
            var isScanning = false;

            function setStatus(msg) {
                if (statusEl) statusEl.textContent = msg || '';
            }

            function setButtons(running) {
                isScanning = running;
                if (btnStart) btnStart.disabled = running;
                if (btnStop) btnStop.disabled = !running;
            }

            function onScanSuccess(decodedText) {
                var wire = window.scanTicketWire;
                if (!wire) return;
                var code = (decodedText || '').trim().toUpperCase();
                if (!code) return;
                wire.set('data.ticket_code', code);
                wire.call('scan');
                stopCamera();
            }

            function onScanError(err) {
                // Ignore repeated "No QR code found" errors
            }

            function stopCamera() {
                if (!html5QrCode || !isScanning) return;
                var scanner = html5QrCode;
                html5QrCode = null;
                setButtons(false);
                setStatus('');
                scanner.stop().then(function() {
                    try { scanner.clear(); } catch (e) {}
                    if (readerEl) readerEl.innerHTML = '';
                    if (readerWrap) readerWrap.classList.add('hidden');
                }).catch(function() {
                    if (readerEl) readerEl.innerHTML = '';
                    if (readerWrap) readerWrap.classList.add('hidden');
                });
            }

            function startCamera() {
                if (isScanning) return;
                if (!window.Html5Qrcode) {
                    setStatus('Library scanner tidak terbaca. Muat ulang halaman.');
                    return;
                }
                setStatus('Meminta akses kamera...');
                if (!readerWrap || !readerEl) return;
                readerWrap.classList.remove('hidden');
                readerEl.innerHTML = '';
                if (html5QrCode) { try { html5QrCode.clear(); } catch (e) {} html5QrCode = null; }
                html5QrCode = new window.Html5Qrcode('reader');
                var config = { fps: 10, qrbox: { width: 260, height: 260 } };
                html5QrCode.start(
                    { facingMode: 'environment' },
                    config,
                    onScanSuccess,
                    onScanError
                ).then(function() {
                    setButtons(true);
                    setStatus('Arahkan kamera ke QR/barcode tiket.');
                }).catch(function(err) {
                    setStatus('Kamera gagal: ' + (err.message || err));
                    if (readerWrap) readerWrap.classList.add('hidden');
                });
            }

            if (btnStart) btnStart.addEventListener('click', startCamera);
            if (btnStop) btnStop.addEventListener('click', stopCamera);

            window.scanTicketStopCamera = stopCamera;
        })();
    </script>
</x-filament-panels::page>
