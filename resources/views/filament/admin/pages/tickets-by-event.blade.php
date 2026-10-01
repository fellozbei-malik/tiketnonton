<x-filament-panels::page>
    {{-- Filter --}}
    <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 p-6 mb-6">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
            <h3 class="text-base font-semibold text-gray-950 dark:text-white">
                {{ __('common.filter') }}
            </h3>
            @if(!blank($filterEventId))
                <a href="{{ route('admin.tickets-by-event.export', ['event_id' => $filterEventId, 'payment_status' => $filterPaymentStatus, 'status' => $filterStatus]) }}"
                   target="_blank"
                   class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus:ring-2 rounded-lg fi-btn-color-primary fi-btn-size-md gap-1.5 px-4 py-2 text-sm inline-grid shadow-sm bg-primary-600 text-white hover:bg-primary-500 dark:bg-primary-500 dark:hover:bg-primary-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    {{ __('common.export_to_excel') }}
                </a>
            @endif
        </div>
        <div class="flex flex-wrap items-end gap-4">
            {{ $this->form }}
        </div>
    </div>

    {{-- List (hanya tampil setelah pilih event) --}}
    <div class="space-y-8">
        @if(blank($filterEventId))
            <div class="fi-section text-center">
                <p class="text-gray-500 dark:text-gray-400">{{ __('common.select_event_to_show_tickets') }}</p>
            </div>
        @else
        @forelse($this->ticketsGroupedByEvent as $group)
            @php
                $event = $group['event'];
                $items = $group['items'];
            @endphp
            <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-gray-800/50">
                    <h2 class="text-xl font-bold text-gray-950 dark:text-white">
                        {{ $event?->name ?? ('Event #' . ($items->first()?->event_id ?? '-')) }}
                    </h2>
                    @if($event)
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            {{ $event->start_time?->translatedFormat('l, d F Y · H:i') ?? '-' }}
                            @if($event->eventCategory)
                                <span class="ml-2">· {{ $event->eventCategory->name }}</span>
                            @endif
                        </p>
                    @endif
                    <p class="mt-1 text-sm font-medium text-gray-600 dark:text-gray-300">
                        {{ $items->count() }} {{ __('common.tickets') }}
                    </p>
                </div>
                <div class="overflow-x-auto">
                    <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 dark:divide-white/5">
                        <thead class="divide-y divide-gray-200 dark:divide-white/5">
                            <tr class="bg-gray-50 dark:bg-white/5">
                                <th class="fi-ta-header-cell px-4 py-3 text-start text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    {{ __('common.ticket_code') }}
                                </th>
                                <th class="fi-ta-header-cell px-4 py-3 text-start text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    {{ __('common.attendee_name') }}
                                </th>
                                <th class="fi-ta-header-cell px-4 py-3 text-start text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    {{ __('common.order_code') }}
                                </th>
                                <th class="fi-ta-header-cell px-4 py-3 text-start text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    {{ __('common.ticket_type') }}
                                </th>
                                <th class="fi-ta-header-cell px-4 py-3 text-start text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    {{ __('common.price') }}
                                </th>
                                <th class="fi-ta-header-cell px-4 py-3 text-start text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    {{ __('common.status') }}
                                </th>
                                <th class="fi-ta-header-cell px-4 py-3 text-start text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    {{ __('common.scanned_at') }}
                                </th>
                                <th class="fi-ta-header-cell px-4 py-3 text-start text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    {{ __('common.scanned_by') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-white/5">
                            @foreach($items as $item)
                                <tr class="fi-ta-row hover:bg-gray-50 dark:hover:bg-white/5">
                                    <td class="fi-ta-cell px-4 py-3 font-mono text-sm font-medium text-gray-950 dark:text-white">
                                        {{ $item->ticket_code }}
                                    </td>
                                    <td class="fi-ta-cell px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                                        {{ $item->attendee_name }}
                                    </td>
                                    <td class="fi-ta-cell px-4 py-3 text-sm text-gray-700 dark:text-gray-300 font-mono">
                                        {{ $item->order?->transaction_code ?? '-' }}
                                    </td>
                                    <td class="fi-ta-cell px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                                        {{ $item->ticket?->name ?? '-' }}
                                    </td>
                                    <td class="fi-ta-cell px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                                        Rp {{ number_format($item->price ?? 0, 0, ',', '.') }}
                                    </td>
                                    <td class="fi-ta-cell px-4 py-3">
                                        @if($item->is_scanned)
                                            <span class="inline-flex items-center gap-1 rounded-md px-2 py-1 text-xs font-medium bg-success-500/10 text-success-600 dark:bg-success-500/20 dark:text-success-400">
                                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ __('common.scanned') }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                                                {{ __('common.pending') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="fi-ta-cell px-4 py-3 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $item->scanned_at?->translatedFormat('d M Y H:i') ?? '-' }}
                                    </td>
                                    <td class="fi-ta-cell px-4 py-3 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $item->scannedByUser?->name ?? '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 p-12 text-center">
                <p class="text-gray-500 dark:text-gray-400">{{ __('common.no_tickets_found') }}</p>
            </div>
        @endforelse
        @endif
    </div>
</x-filament-panels::page>
