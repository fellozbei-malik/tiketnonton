<?php

namespace App\Filament\Admin\Resources\HelpCenterMessageResource\Pages;

use App\Filament\Admin\Resources\HelpCenterMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHelpCenterMessage extends ViewRecord
{
    protected static string $resource = HelpCenterMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
