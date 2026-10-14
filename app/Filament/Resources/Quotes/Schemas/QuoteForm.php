<?php

namespace App\Filament\Resources\Quotes\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;

class QuoteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->schema([
                    Textarea::make('quote')
                        ->label(__('sidebar.quote'))
                        ->required()->rows(10),
                ])->columnSpanFull(),
            ]);
    }
}
