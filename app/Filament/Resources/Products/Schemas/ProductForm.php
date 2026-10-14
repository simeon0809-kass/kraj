<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
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
                        Select::make('category_id')
                            ->label(__('sidebar.category'))
                            ->options(Category::all()->pluck('title', 'id'))
                            ->required(),
                        Textarea::make('description')
                            ->label(__('sidebar.description'))
                            ->rows(10)
                            ->required(),
                    ]),
                Section::make()
                    ->schema([
                        FileUpload::make('image')
                            ->label(__('sidebar.image'))
                            ->image()
                            ->required()
                            ->saveToImageKit(),
                    ]) 
            ])->columns(2);
    }
}
