<?php

namespace App\Filament\Resources\Pets\Schemas;

use App\Models\Owner;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([

                Section::make('Pemilik Hewan')
                    ->description('Pilih pemilik dengan nomor telepon yang telah diverifikasi')
                    ->schema([

                        Select::make('owner_id')
                            ->label('Pemilik')
                            ->options(
                                Owner::whereNotNull('phone_verified_at')
                                    ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->required(),
                    ]),

                Section::make('Data Hewan')
                    ->description('Masukkan data hewan dalam satu baris sesuai format yang ditentukan')
                    ->schema([

                        TextInput::make('pet_input')
                            ->label('Data Hewan')
                            ->required()
                            ->helperText(
                                'Format: NAMA JENIS USIA BERAT (contoh: Milo Kucing 2Th 4,5kg)'
                            )
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
