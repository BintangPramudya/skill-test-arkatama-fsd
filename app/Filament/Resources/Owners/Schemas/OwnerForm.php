<?php

namespace App\Filament\Resources\Owners\Schemas;

use Filament\Forms\Components\DateTimePicker;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OwnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([

                Section::make('Informasi Pemilik')
                    ->description('Data identitas pemilik hewan')
                    ->columns(2)
                    ->schema([

                        TextInput::make('name')
                            ->label('Nama Pemilik')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->required()
                            ->maxLength(20)
                            ->helperText('Gunakan nomor aktif (contoh: 08xxxxxxxxxx)'),
                    ]),

                Section::make('Verifikasi Nomor')
                    ->description('Status verifikasi nomor telepon')
                    ->schema([

                        DateTimePicker::make('phone_verified_at')
                            ->label('Nomor Terverifikasi Pada')
                            ->helperText('Kosongkan jika nomor belum diverifikasi'),
                    ]),
            ]);
    }
}
