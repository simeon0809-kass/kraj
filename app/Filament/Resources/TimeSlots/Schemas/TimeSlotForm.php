<?php

namespace App\Filament\Resources\TimeSlots\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class TimeSlotForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('day_of_week')
                    ->label('Ден од неделата')
                    ->options([
                        1 => 'Понеделник (Monday)',
                        2 => 'Вторник (Tuesday)',
                        3 => 'Среда (Wednesday)',
                        4 => 'Четврток (Thursday)',
                        5 => 'Петок (Friday)',
                        6 => 'Сабота (Saturday)',
                        7 => 'Недела (Sunday)',
                    ])
                    ->required(),
                TimePicker::make('start_time')
                    ->label('Почетно време')
                    ->seconds(false) // Hides seconds in the picker
                    ->required(),
                TimePicker::make('end_time')
                    ->label('Крајно време')
                    ->seconds(false)
                    ->required(),
                TextInput::make('max_capacity')
                    ->label('Максимален капацитет')
                    ->numeric()
                    ->default(15)
                    ->required(),
            ]);
    }
}
