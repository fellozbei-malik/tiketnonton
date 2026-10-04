<?php

namespace App\Filament\Admin\Resources\PriceComponentResource\Pages;

use App\Filament\Admin\Resources\PriceComponentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPriceComponent extends EditRecord
{
    protected static string $resource = PriceComponentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
