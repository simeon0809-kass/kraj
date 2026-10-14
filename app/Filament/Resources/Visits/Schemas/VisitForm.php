<?php

namespace App\Filament\Resources\Visits\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VisitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('date')
                    ->label('Датум')
                    ->required(),
                TextInput::make('time')
                    ->label('Време')
                    ->required(),
                TextInput::make('prisoner_num')
                    ->label('Број на затвореник')
                    ->required(),
                TextInput::make('visitors')
                    ->label('Посетител(и)')
                    ->required(),
                TextInput::make('phone')
                    ->label('Телефонски број')
                    ->tel()
                    ->required(),

            ]);
    }
}
