<?php

namespace App\Filament\Admin\Resources\PartnerRequestResource\Pages;

use App\Filament\Admin\Resources\PartnerRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePartnerRequest extends CreateRecord
{
    protected static string $resource = PartnerRequestResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
