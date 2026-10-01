<?php

namespace App\Filament\Admin\Resources\PartnerRequestResource\Pages;

use App\Filament\Admin\Resources\PartnerRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnerRequest extends EditRecord
{
    protected static string $resource = PartnerRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
