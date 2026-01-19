<?php

namespace App\Filament\Resources\Owners\Pages;

use App\Filament\Resources\Owners\OwnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOwner extends EditRecord
{
    protected static string $resource = OwnerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
