<?php

namespace App\Filament\Resources\Checkups;

use App\Filament\Resources\Checkups\Pages\CreateCheckup;
use App\Filament\Resources\Checkups\Pages\EditCheckup;
use App\Filament\Resources\Checkups\Pages\ListCheckups;
use App\Filament\Resources\Checkups\Schemas\CheckupForm;
use App\Filament\Resources\Checkups\Tables\CheckupsTable;
use App\Models\Checkup;
use BackedEnum;
use Filament\Resources\Resource;
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
}
