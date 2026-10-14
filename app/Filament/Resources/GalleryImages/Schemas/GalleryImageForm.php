<?php

namespace App\Filament\Resources\GalleryImages\Schemas;

use App\Models\Gallery;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Select::make('gallery_id')
                            ->label('Галерија')
                            ->options(Gallery::all()->pluck('title', 'id'))
                            ->required(),
                        FileUpload::make('image')
                            ->label('Слика')
                            ->image()
                            ->required()
                            ->saveToImageKit(),
                    ]),
            ]);
    }
}
