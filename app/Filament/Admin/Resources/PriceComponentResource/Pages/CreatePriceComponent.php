<?php

namespace App\Filament\Admin\Resources\PriceComponentResource\Pages;

use App\Filament\Admin\Resources\PriceComponentResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePriceComponent extends CreateRecord
{
    protected static string $resource = PriceComponentResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
