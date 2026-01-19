<?php

namespace App\Filament\Resources\Treatments\Pages;

use App\Filament\Resources\Treatments\TreatmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTreatment extends EditRecord
{
    protected static string $resource = TreatmentResource::class;

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
