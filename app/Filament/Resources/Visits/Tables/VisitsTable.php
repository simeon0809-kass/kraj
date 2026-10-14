<?php

namespace App\Filament\Resources\Visits\Tables;

use App\Filament\Exports\VisitExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VisitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('date', 'desc')
            ->columns([
                TextColumn::make('date')
                    ->label('Датум')
                    ->date('Y-m-d')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('time')
                    ->label('Термин')
                    ->searchable(),
                TextColumn::make('prisoner_num')
                    ->label('Затвореник бр.')
                    ->searchable()
                    ->copyable()
                    ->sortable(),
                TextColumn::make('visitors')
                    ->label('Посетител/и')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable()
                    ->copyable()
                    ->sortable(),
                TextColumn::make('children_names')
                    ->label('Деца')
                    ->searchable(),
                TextColumn::make('visit_code')
                    ->label('Код на Посетител')
                    ->searchable(),
                TextColumn::make('declared_items')
                    ->label('Предмети')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Закажано на')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')
                    ->label('Статус')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()->exporter(VisitExporter::class),
            ])
            ->recordActions([
                DeleteAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
                ExportBulkAction::make()->exporter(VisitExporter::class),
            ]);
    }
}
