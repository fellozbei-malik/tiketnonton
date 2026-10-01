<?php

namespace App\Filament\Admin\Pages;

use App\Models\Event;
use App\Models\Order;
use App\Models\OrderItem;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class TicketsByEvent extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Semua Tiket';

    protected static ?string $title = 'Tiket per Event';

    protected static ?string $slug = 'tickets-by-event';

    protected static string $view = 'filament.admin.pages.tickets-by-event';

    protected static ?string $navigationGroup = 'Tiket';

    protected static ?int $navigationSort = 3;

    /** Event yang dipilih di filter (null = belum pilih). */
    public ?string $filterEventId = null;

    /** Status filter: '' = semua, 'scanned' = terscan, 'pending' = menunggu. */
    public string $filterStatus = '';

    /** Status pembayaran order: '' = semua, 'paid' = sudah bayar, 'unpaid' = belum bayar. */
    public string $filterPaymentStatus = '';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('filterEventId')
                    ->label(__('common.event'))
                    ->placeholder(__('common.select_event'))
                    ->options(fn () => $this->getEventsWithTicketsProperty()->pluck('name', 'id')->all())
                    ->searchable()
                    ->live(),
                Select::make('filterPaymentStatus')
                    ->label(__('common.payment_status'))
                    ->options([
                        '' => __('common.all'),
                        'paid' => __('common.paid'),
                        'unpaid' => __('common.unpaid'),
                    ])
                    ->live(),
                Select::make('filterStatus')
                    ->label(__('common.status'))
                    ->options([
                        '' => __('common.all'),
                        'scanned' => __('common.scanned'),
                        'pending' => __('common.pending'),
                    ])
                    ->live(),
            ])
            ->columns(3)
            ->statePath('');
    }

    /**
     * Daftar event yang punya tiket (untuk dropdown filter).
     *
     * @return Collection<int, Event>
     */
    public function getEventsWithTicketsProperty(): Collection
    {
        $eventIds = OrderItem::select('event_id')->distinct()->pluck('event_id');

        return Event::query()
            ->whereIn('id', $eventIds)
            ->orderBy('name')
            ->get();
    }

    /**
     * Tiket (order items) sesuai filter, dikelompokkan per event.
     *
     * @return Collection<int, array{event: \App\Models\Event|null, items: Collection<int, OrderItem>}>
     */
    public function getTicketsGroupedByEventProperty(): Collection
    {
        if (blank($this->filterEventId)) {
            return collect();
        }

        $query = OrderItem::with(['event', 'event.eventCategory', 'order', 'attendee', 'ticket', 'scannedByUser'])
            ->where('event_id', $this->filterEventId)
            ->orderBy('ticket_code');

        if ($this->filterPaymentStatus === 'paid') {
            $query->whereHas('order', fn ($q) => $q->where('status', Order::STATUS_PAID));
        } elseif ($this->filterPaymentStatus === 'unpaid') {
            $query->whereHas('order', fn ($q) => $q->where('status', '!=', Order::STATUS_PAID));
        }

        if ($this->filterStatus === 'scanned') {
            $query->where('is_scanned', true);
        } elseif ($this->filterStatus === 'pending') {
            $query->where('is_scanned', false);
        }

        $items = $query->get();

        if ($items->isEmpty()) {
            return collect();
        }

        return $items->groupBy('event_id')->map(function (Collection $group, $eventId) {
            $first = $group->first();
            return [
                'event' => $first->event,
                'items' => $group,
            ];
        })->values();
    }
}
