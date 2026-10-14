<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->schema([
                    TextInput::make('title')
                        ->label(__('sidebar.title'))
                        ->required(),
                    Textarea::make('description')
                        ->label(__('sidebar.description'))
                        ->required()->rows(10),
                ])->columnSpanFull(),
            ]);
    }
}
