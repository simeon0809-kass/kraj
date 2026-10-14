<?php

namespace App\Filament\Resources\TimeSlots\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TimeSlotsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day_of_week')
                    ->label('Ден')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        '1' => 'Понеделник',
                        '2' => 'Вторник',
                        '3' => 'Среда',
                        '4' => 'Четврток',
                        '5' => 'Петок',
                        '6' => 'Сабота',
                        '7' => 'Недела',
                        default => 'Непознато',
                    })
                    ->sortable(),
                TextColumn::make('start_time')
                    ->label('Од')
                    ->time('H:i'),
                TextColumn::make('end_time')
                    ->label('До')
                    ->time('H:i'),
                TextColumn::make('max_capacity')
                    ->label('Капацитет')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('sidebar.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('sidebar.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
