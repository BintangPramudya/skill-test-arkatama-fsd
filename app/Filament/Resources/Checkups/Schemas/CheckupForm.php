<?php

namespace App\Filament\Resources\Checkups\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CheckupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([

                Section::make('Informasi Pemeriksaan')
                    ->description('Pilih hewan dan jenis perawatan yang dilakukan')
                    ->columns(2)
                    ->schema([

                        Select::make('pet_id')
                            ->label('Hewan')
                            ->relationship('pet', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('treatment_id')
                            ->label('Jenis Perawatan')
                            ->relationship('treatment', 'name')
                            ->required(),

                        DatePicker::make('checkup_date')
                            ->label('Tanggal Pemeriksaan')
                            ->required(),
                    ]),

                Section::make('Catatan')
                    ->description('Catatan tambahan hasil pemeriksaan')
                    ->schema([

                        Textarea::make('note')
                            ->label('Catatan Pemeriksaan')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
