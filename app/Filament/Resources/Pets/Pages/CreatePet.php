<?php

namespace App\Filament\Resources\Pets\Pages;

use App\Filament\Resources\Pets\PetResource;
use App\Models\Pet;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\QueryException;



class CreatePet extends CreateRecord
{
    protected static string $resource = PetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $input = preg_replace('/\s+/', ' ', trim($data['pet_input']));
        $parts = explode(' ', $input);

        if (count($parts) < 4) {
            Notification::make()
                ->title('Format data tidak valid')
                ->body('Gunakan format: NAMA JENIS USIA BERAT')
                ->danger()
                ->send();

            $this->halt();
        }

        $name = strtoupper($parts[0]);
        $type = strtoupper($parts[1]);

        // 🔑 Ambil usia dari SELURUH input (bukan index array)
        preg_match('/\b(\d+)\s*(tahun|thn|th)?\b/i', $input, $ageMatch);

        // 🔑 Ambil berat dari SELURUH input
        preg_match('/(\d+(?:[.,]\d+)?)\s*kg/i', $input, $weightMatch);


        if (empty($ageMatch[1]) || empty($weightMatch[1])) {
            Notification::make()
                ->title('Usia atau berat tidak valid')
                ->danger()
                ->send();

            $this->halt();
        }

        try {
            return \App\Models\Pet::create([
                'owner_id' => $data['owner_id'],
                'name'     => $name,
                'type'     => $type,
                'age'      => (int) $ageMatch[1],
                'weight'   => (float) $weightMatch[1],
            ]);
        } catch (QueryException $e) {


            if ($e->getCode() === '23000') {
                Notification::make()
                    ->title('Data duplikat')
                    ->body('Hewan dengan nama dan jenis yang sama sudah dimiliki oleh pemilik ini.')
                    ->danger()
                    ->send();

                $this->halt();
            }

            throw $e;
        }
    }
}
