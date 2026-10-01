<?php

namespace App\Filament\Admin\Pages;

use App\Models\Order;
use App\Models\OrderItem;
use Filament\Actions\Action;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Illuminate\Support\Str;

class ScanTicket extends Page
{
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-qr-code';

    protected static ?string $navigationLabel = 'Scan Tiket';

    protected static ?string $title = 'Scan Tiket';

    protected static ?string $slug = 'scan-ticket';

    protected static string $view = 'filament.admin.pages.scan-ticket';

    protected static ?string $navigationGroup = 'Tiket';

    protected static ?int $navigationSort = 2;

    /**
     * @var array<string, mixed>
     */
    public ?array $data = [];

    /** ID order item yang sedang ditampilkan (preview sebelum approve). */
    public ?int $previewOrderItemId = null;

    public function mount(): void
    {
        $this->form->fill(['ticket_code' => '']);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ticket_code')
                    ->label(__('Kode Tiket'))
                    ->placeholder(__('Scan atau ketik kode tiket'))
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('ticket_code', $state ? Str::upper(Str::trim($state)) : '')),
            ])
            ->statePath('data');
    }

    /**
     * @return array<Action | \Filament\Actions\ActionGroup>
     */
    protected function getFormActions(): array
    {
        return [
            Action::make('lookup')
                ->label(__('Cari / Tampilkan Detail Tiket'))
                ->submit('lookupTicket')
                ->icon('heroicon-o-magnifying-glass')
                ->color('primary'),
        ];
    }

    /** Order item yang sedang di-preview (untuk ditampilkan di view). */
    public function getPreviewOrderItemProperty(): ?OrderItem
    {
        if (! $this->previewOrderItemId) {
            return null;
        }

        return OrderItem::with(['order', 'order.user', 'event', 'attendee', 'ticket', 'scannedByUser'])
            ->find($this->previewOrderItemId);
    }

    /** Cari tiket dan tampilkan detail (tanpa approve). */
    public function lookupTicket(): void
    {
        $this->previewOrderItemId = null;

        $data = $this->form->getState();
        $ticketCode = Str::upper(Str::trim((string) ($data['ticket_code'] ?? '')));

        if ($ticketCode === '') {
            Notification::make()
                ->title(__('Kode tiket wajib diisi.'))
                ->danger()
                ->send();
            return;
        }

        $orderItem = OrderItem::where('ticket_code', $ticketCode)
            ->with(['order', 'event', 'attendee', 'ticket'])
            ->first();

        if (! $orderItem) {
            Notification::make()
                ->title(__('Kode tiket tidak ditemukan.'))
                ->body(__('Pastikan kode tiket benar dan terdaftar.'))
                ->danger()
                ->send();
            return;
        }

        if ($orderItem->order->status !== Order::STATUS_PAID) {
            Notification::make()
                ->title(__('Pesanan belum dibayar.'))
                ->body(__('Tiket hanya dapat di-scan untuk pesanan yang sudah dibayar (status Paid).'))
                ->danger()
                ->send();
            return;
        }

        if ($orderItem->is_scanned) {
            Notification::make()
                ->title(__('Tiket sudah pernah di-scan.'))
                ->body(__('Tiket ini sudah di-approve pada :date oleh :user.', [
                    'date' => $orderItem->scanned_at?->translatedFormat('d M Y H:i'),
                    'user' => $orderItem->scannedByUser?->name ?? '-',
                ]))
                ->warning()
                ->send();
            return;
        }

        $this->previewOrderItemId = $orderItem->id;
    }

    /** Approve tiket yang sedang di-preview. */
    public function approvePreview(): void
    {
        if (! $this->previewOrderItemId) {
            Notification::make()->title(__('Tidak ada tiket untuk di-approve.'))->danger()->send();
            return;
        }

        $orderItem = OrderItem::with(['order', 'event', 'attendee'])->find($this->previewOrderItemId);

        if (! $orderItem) {
            $this->previewOrderItemId = null;
            Notification::make()->title(__('Tiket tidak ditemukan.'))->danger()->send();
            return;
        }

        if ($orderItem->order->status !== Order::STATUS_PAID) {
            Notification::make()
                ->title(__('Pesanan belum dibayar. Approve dibatalkan.'))
                ->danger()
                ->send();
            return;
        }

        if ($orderItem->is_scanned) {
            $this->previewOrderItemId = null;
            Notification::make()
                ->title(__('Tiket ini sudah di-approve sebelumnya.'))
                ->warning()
                ->send();
            return;
        }

        $orderItem->update([
            'is_scanned' => true,
            'scanned_at' => now(),
            'scanned_by' => auth()->id(),
        ]);

        $attendeeName = $orderItem->attendee_name;
        $eventName = $orderItem->event?->name ?? '-';

        Notification::make()
            ->title(__('Tiket berhasil di-approve'))
            ->body(__('Event: :event. Atendee: :attendee.', [
                'event' => $eventName,
                'attendee' => $attendeeName,
            ]))
            ->success()
            ->send();

        $this->previewOrderItemId = null;
        $this->form->fill(['ticket_code' => '']);
    }

    /** Batal preview dan kosongkan detail. */
    public function clearPreview(): void
    {
        $this->previewOrderItemId = null;
    }

    /** Dipanggil dari callback kamera: isi kode lalu tampilkan detail (sama seperti lookup). */
    public function scan(): void
    {
        $this->lookupTicket();
    }
}
