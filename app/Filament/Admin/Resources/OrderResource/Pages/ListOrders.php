<?php

namespace App\Filament\Admin\Resources\OrderResource\Pages;

use App\Filament\Admin\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Columns\Column;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->exports([
                    ExcelExport::make()
                        ->withFilename(fn () => 'orders-' . date('Y-m-d-His'))
                        ->withColumns([
                            Column::make('transaction_code')->heading('Transaction Code'),
                            Column::make('user.name')->heading('Customer Name'),
                            Column::make('user.email')->heading('Customer Email'),
                            Column::make('total_amount')->heading('Total Amount (IDR)'),
                            Column::make('status')->heading('Status'),
                            Column::make('payment_method')->heading('Payment Method'),
                            Column::make('created_at')->heading('Order Date'),
                        ])
                ]),
        ];
    }
}
