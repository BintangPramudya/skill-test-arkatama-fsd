<?php

namespace App\Filament\Resources\Pets;

use App\Filament\Resources\Pets\Pages\CreatePet;
use App\Filament\Resources\Pets\Pages\EditPet;
use App\Filament\Resources\Pets\Pages\ListPets;
use App\Filament\Resources\Pets\Schemas\PetForm;
use App\Filament\Resources\Pets\Tables\PetsTable;
use App\Models\Pet;
use BackedEnum;
use Filament\Resources\Resource;
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
}
