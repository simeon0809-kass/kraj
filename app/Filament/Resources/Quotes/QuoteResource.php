<?php

namespace App\Filament\Resources\Quotes;

use App\Filament\Resources\Quotes\Pages\CreateQuote;
use App\Filament\Resources\Quotes\Pages\EditQuote;
use App\Filament\Resources\Quotes\Pages\ListQuotes;
use App\Filament\Resources\Quotes\Schemas\QuoteForm;
use App\Filament\Resources\Quotes\Tables\QuotesTable;
use App\Models\Quote;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;

    public static function getNavigationLabel(): string
    {
        return __('sidebar.quotes');
    }

    public static function getPluralModelLabel(): string
    {
        return __('sidebar.quotes');
    }

    public static function getModelLabel(): string
    {
        return __('sidebar.quote');
    }


    protected static string|BackedEnum|null $navigationIcon = Heroicon::BookOpen;

    protected static ?string $recordTitleAttribute = 'Quotes';

    protected static ?int $navigationSort = 20;

    protected static string|null|UnitEnum $navigationGroup = 'Crafts';

    public static function form(Schema $schema): Schema
    {
        return QuoteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuotesTable::configure($table);
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
            'index' => ListQuotes::route('/'),
            'create' => CreateQuote::route('/create'),
            'edit' => EditQuote::route('/{record}/edit'),
        ];
    }
}
