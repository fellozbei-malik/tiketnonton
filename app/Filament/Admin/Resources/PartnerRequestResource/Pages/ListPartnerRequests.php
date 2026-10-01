<?php

namespace App\Filament\Admin\Resources\PartnerRequestResource\Pages;

use App\Filament\Admin\Resources\PartnerRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnerRequests extends ListRecords
{
    protected static string $resource = PartnerRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
