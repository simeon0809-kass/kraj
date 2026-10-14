<?php

namespace App\Filament\Resources\GalleryImages\Tables;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GalleryImageTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('url')
                    ->label('Слика'),
                TextColumn::make('gallery.title')
                    ->label('Галерија')
                    ->sortable()
                    ->searchable(),
            ]);
    }
}
