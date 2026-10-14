<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use ImageKit\ImageKit;

class ActivitiesForm
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
                            ->required(),
                    ])->columnSpan(2),
                Section::make()
                    ->schema([
                        FileUpload::make('image')
                            ->label(__('sidebar.image'))
                            ->image()
                            ->required()
                            ->saveToImageKit(),
                    ])->columnSpan(1),
            ])->columns(3);
    }
}
