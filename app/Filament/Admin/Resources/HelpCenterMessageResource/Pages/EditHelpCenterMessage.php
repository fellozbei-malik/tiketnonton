<?php

namespace App\Filament\Admin\Resources\HelpCenterMessageResource\Pages;

use App\Filament\Admin\Resources\HelpCenterMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHelpCenterMessage extends EditRecord
{
    protected static string $resource = HelpCenterMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
