<?php

namespace App\Exports;

use App\Models\OrderItem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TicketsByEventExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(
        protected Collection $items
    ) {}

    public function collection(): Collection
    {
        return $this->items;
    }

    public function headings(): array
    {
        return [
            __('common.ticket_code'),
            __('common.attendee_name'),
            __('common.order_code'),
            __('common.ticket_type'),
            __('common.price'),
            __('common.status'),
            __('common.scanned_at'),
            __('common.scanned_by'),
        ];
    }

    /**
     * @param OrderItem $item
     */
    public function map($item): array
    {
        return [
            $item->ticket_code,
            $item->attendee_name,
            $item->order?->transaction_code ?? '-',
            $item->ticket?->name ?? '-',
            $item->price ? 'Rp ' . number_format((float) $item->price, 0, ',', '.') : '-',
            $item->is_scanned ? __('common.scanned') : __('common.pending'),
            $item->scanned_at?->format('d M Y H:i') ?? '-',
            $item->scannedByUser?->name ?? '-',
        ];
    }
}
