<?php

namespace App\Filament\Admin\Resources\PriceComponentResource\Pages;

use App\Filament\Admin\Resources\PriceComponentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPriceComponents extends ListRecords
{
    protected static string $resource = PriceComponentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
