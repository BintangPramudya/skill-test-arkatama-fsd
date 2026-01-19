<?php

namespace App\Filament\Resources\Checkups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Schemas\Components\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CheckupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // Hewan
                TextColumn::make('pet.name')
                    ->label('Hewan')
                    ->searchable()
                    ->sortable(),

                // Pemilik (relasi tidak langsung)
                TextColumn::make('pet.owner.name')
                    ->label('Pemilik')
                    ->searchable()
                    ->sortable(),

                // Jenis Perawatan
                TextColumn::make('treatment.name')
                    ->label('Perawatan')
                    ->badge()
                    ->sortable(),

                // Tanggal Pemeriksaan
                TextColumn::make('checkup_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                // Catatan
                TextColumn::make('note')
                    ->label('Catatan')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->defaultSort('checkup_date', 'desc')

            ->recordActions([
                EditAction::make(),
                ViewAction::make()
                    ->label('Lihat Detail'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
