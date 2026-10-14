<?php

namespace App\Filament\Resources\Activities;

use App\Filament\Resources\Activities\Pages\CreateActivities;
use App\Filament\Resources\Activities\Pages\EditActivities;
use App\Filament\Resources\Activities\Pages\ListActivities;
use App\Filament\Resources\Activities\Schemas\ActivitiesForm;
use App\Filament\Resources\Activities\Tables\ActivitiesTable;
use App\Models\Activities;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivitiesResource extends Resource
{
    protected static ?string $model = Activities::class;

    public static function getNavigationLabel(): string
    {
        return __('sidebar.activities');
    }

    public static function getPluralModelLabel(): string
    {
        return __('sidebar.activities');
    }

    public static function getModelLabel(): string
    {
        return __('sidebar.activity');
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::AcademicCap;

    protected static ?string $recordTitleAttribute = 'Activity';

    public static function form(Schema $schema): Schema
    {
        return ActivitiesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivitiesTable::configure($table);
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
            'index' => ListActivities::route('/'),
            'create' => CreateActivities::route('/create'),
            'edit' => EditActivities::route('/{record}/edit'),
        ];
    }
}
