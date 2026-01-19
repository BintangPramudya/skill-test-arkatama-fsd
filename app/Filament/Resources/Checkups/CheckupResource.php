<?php

namespace App\Filament\Resources\Checkups;

use App\Filament\Resources\Checkups\Pages\CreateCheckup;
use App\Filament\Resources\Checkups\Pages\EditCheckup;
use App\Filament\Resources\Checkups\Pages\ListCheckups;
use App\Filament\Resources\Checkups\Schemas\CheckupForm;
use App\Filament\Resources\Checkups\Tables\CheckupsTable;
use App\Models\Checkup;
use BackedEnum;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CheckupResource extends Resource
{
    protected static ?string $model = Checkup::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentCheck;

    protected static ?string $recordTitleAttribute = 'Checkup';

    public static function form(Schema $schema): Schema
    {
        return CheckupForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CheckupsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCheckups::route('/'),
            'create' => CreateCheckup::route('/create'),
            'edit' => EditCheckup::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Pemeriksaan';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Pemeriksaan';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getModelLabel(): string
    {
        return 'Pemeriksaan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Data Pemeriksaan';
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Hewan')
                    ->description('Detail hewan yang diperiksa')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('pet.name')
                            ->label('Nama Hewan'),

                        TextEntry::make('pet.type')
                            ->label('Jenis Hewan'),

                        TextEntry::make('pet.owner.name')
                            ->label('Pemilik')
                            ->columnSpanFull(),
                    ]),

                Section::make('Detail Pemeriksaan')
                    ->description('Informasi pemeriksaan yang dilakukan')
                    ->columns(2)
                    ->schema([

                        TextEntry::make('treatment.name')
                            ->label('Jenis Perawatan'),

                        TextEntry::make('checkup_date')
                            ->label('Tanggal Pemeriksaan')
                            ->date('d M Y'),
                    ]),

                Section::make('Catatan Pemeriksaan')
                    ->description('Catatan tambahan hasil pemeriksaan')
                    ->schema([

                        TextEntry::make('note')
                            ->label('Catatan')
                            ->placeholder('Tidak ada catatan'),
                    ]),

                Section::make('Informasi Sistem')
                    ->collapsed()
                    ->schema([

                        TextEntry::make('created_at')
                            ->label('Dibuat Pada')
                            ->dateTime('d M Y H:i'),

                        TextEntry::make('updated_at')
                            ->label('Diubah Pada')
                            ->dateTime('d M Y H:i'),
                    ]),
            ]);
    }
}
