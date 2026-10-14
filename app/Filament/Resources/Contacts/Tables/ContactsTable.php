<?php

namespace App\Filament\Resources\Contacts\Tables;

use App\Filament\Exports\ContactExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('sidebar.name'))
                    ->toggleable(),
                TextColumn::make('phone')
                    ->label(__('sidebar.phone'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->label(__('sidebar.email'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('relationship')
                    ->label(__('sidebar.relationship'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('message')
                    ->label(__('sidebar.message'))
                    ->toggleable()
                    ->limit(100),
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
            ->headerActions([
                ExportAction::make()->exporter(ContactExporter::class),
            ])
            ->recordActions([
                DeleteAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
                ExportBulkAction::make()->exporter(ContactExporter::class),
            ]);
    }
}
