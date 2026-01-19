<?php

namespace App\Filament\Resources\Pets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // Pemilik
                TextColumn::make('owner.name')
                    ->label('Pemilik')
                    ->searchable()
                    ->sortable(),

                // Kode Hewan
                TextColumn::make('code')
                    ->label('Kode Hewan')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->tooltip('Kode registrasi hewan'),

                // Nama Hewan
                TextColumn::make('name')
                    ->label('Nama Hewan')
                    ->searchable(),

                // Jenis Hewan
                TextColumn::make('type')
                    ->label('Jenis')
                    ->searchable(),

                // Usia
                TextColumn::make('age')
                    ->label('Usia (Tahun)')
                    ->sortable(),

                // Berat
                TextColumn::make('weight')
                    ->label('Berat (Kg)')
                    ->sortable()
                    ->formatStateUsing(fn($state) => "{$state} kg"),

                // Tanggal Dibuat
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Tanggal Diubah
                TextColumn::make('updated_at')
                    ->label('Diubah Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->defaultSort('created_at', 'desc')

            ->recordActions([
                EditAction::make(),
                ViewAction::make()
                    ->label('Lihat Detail')
                    ->icon('heroicon-o-eye'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
