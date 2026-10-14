<?php

namespace App\Filament\Resources\Visits;

use App\Filament\Resources\Visits\Pages\CreateVisit;
use App\Filament\Resources\Visits\Pages\EditVisit;
use App\Filament\Resources\Visits\Pages\ListVisits;
use App\Filament\Resources\Visits\Schemas\VisitForm;
use App\Filament\Resources\Visits\Tables\VisitsTable;
use App\Models\Visit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class VisitResource extends Resource
{
    protected static ?string $model = Visit::class;

    public static function getNavigationLabel(): string
    {
        return __('sidebar.visits');
    }

    public static function getPluralModelLabel(): string
    {
        return __('sidebar.visits');
    }

    public static function getModelLabel(): string
    {
        return __('sidebar.visit');
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Identification;

    protected static ?string $recordTitleAttribute = 'Visit';

    protected static string|null|UnitEnum $navigationGroup = 'Visits';
    
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return VisitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VisitsTable::configure($table);
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
            'index' => ListVisits::route('/'),
            'create' => CreateVisit::route('/create'),
            'edit' => EditVisit::route('/{record}/edit'),
        ];
    }
}
