<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalleryTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Наслов')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Создадено')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}
