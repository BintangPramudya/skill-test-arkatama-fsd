<?php

namespace App\Filament\Resources\Owners;

use App\Filament\Resources\Owners\Pages\CreateOwner;
use App\Filament\Resources\Owners\Pages\EditOwner;
use App\Filament\Resources\Owners\Pages\ListOwners;
use App\Filament\Resources\Owners\Schemas\OwnerForm;
use App\Filament\Resources\Owners\Tables\OwnersTable;
use App\Models\Owner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OwnerResource extends Resource
{
    protected static ?string $model = Owner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::User;

    protected static ?string $recordTitleAttribute = 'Owner';

    public static function form(Schema $schema): Schema
    {
        return OwnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OwnersTable::configure($table);
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
            'index' => ListOwners::route('/'),
            'create' => CreateOwner::route('/create'),
            'edit' => EditOwner::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Pemilik';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getModelLabel(): string
    {
        return 'Pemilik';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pemilik';
    }
}
