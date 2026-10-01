<?php

namespace App\Filament\Admin\Resources\OrderResource\Pages;

use App\Filament\Admin\Resources\OrderResource;
use App\Models\Order;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('approvePayment')
                ->label('Approve Payment')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->requiresConfirmation()
                ->modalHeading('Approve payment?')
                ->modalDescription('Order will be marked as paid. Customer can download e-tickets.')
                ->action(function (Order $record) {
                    $record->update(['status' => Order::STATUS_PAID]);
                    Notification::make()
                        ->title('Payment approved')
                        ->success()
                        ->send();
                })
                ->visible(fn (Order $record): bool => $record->status === Order::STATUS_PENDING_VERIFICATION),
            Actions\Action::make('rejectPayment')
                ->label('Reject Payment')
                ->color('danger')
                ->icon('heroicon-o-x-circle')
                ->requiresConfirmation()
                ->modalHeading('Reject payment?')
                ->modalDescription('Order will be marked as rejected.')
                ->action(function (Order $record) {
                    $record->update(['status' => Order::STATUS_REJECTED]);
                    Notification::make()
                        ->title('Payment rejected')
                        ->success()
                        ->send();
                })
                ->visible(fn (Order $record): bool => $record->status === Order::STATUS_PENDING_VERIFICATION),
            Actions\EditAction::make(),
        ];
    }
}
