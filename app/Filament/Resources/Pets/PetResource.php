<?php

namespace App\Filament\Resources\Pets;

use App\Filament\Resources\Pets\Pages\CreatePet;
use App\Filament\Resources\Pets\Pages\EditPet;
use App\Filament\Resources\Pets\Pages\ListPets;
use App\Filament\Resources\Pets\Schemas\PetForm;
use App\Filament\Resources\Pets\Tables\PetsTable;
use App\Models\Pet;
use BackedEnum;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PetResource extends Resource
{
    protected static ?string $model = Pet::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Heart;

    protected static ?string $recordTitleAttribute = 'Pet';

    public static function form(Schema $schema): Schema
    {
        return PetForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PetsTable::configure($table);
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
            'index' => ListPets::route('/'),
            'create' => CreatePet::route('/create'),
            'edit' => EditPet::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Hewan';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getModelLabel(): string
    {
        return 'Hewan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Data Hewan';
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Pemilik Hewan')
                    ->description('Informasi pemilik hewan')
                    ->schema([
                        TextEntry::make('owner.name')
                            ->label('Nama Pemilik'),
                    ]),

                Section::make('Data Hewan')
                    ->description('Data hewan hasil pengolahan sistem')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama Hewan'),

                        TextEntry::make('type')
                            ->label('Jenis Hewan'),

                        TextEntry::make('age')
                            ->label('Usia')
                            ->suffix(' tahun'),

                        TextEntry::make('weight')
                            ->label('Berat')
                            ->suffix(' kg'),

                        TextEntry::make('code')
                            ->label('Kode Hewan')
                            ->copyable()
                            ->columnSpanFull(),
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
