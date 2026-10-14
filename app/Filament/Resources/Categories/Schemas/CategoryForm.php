<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
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
                            ->rows(10)
                            ->columnSpanFull(),
                    ])

            ])->columns(1);
    }
}
