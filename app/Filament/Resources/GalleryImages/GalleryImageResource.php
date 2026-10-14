<?php

namespace App\Filament\Resources\GalleryImages;

use App\Filament\Resources\GalleryImages\Pages\CreateGalleryImage;
use App\Filament\Resources\GalleryImages\Pages\EditGalleryImage;
use App\Filament\Resources\GalleryImages\Pages\ListGalleryImages;
use App\Filament\Resources\GalleryImages\Schemas\GalleryImageForm;
use App\Filament\Resources\GalleryImages\Tables\GalleryImageTable;
use App\Models\GalleryImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GalleryImageResource extends Resource
{
    protected static ?string $model = GalleryImage::class;

    public static function getNavigationLabel(): string
    {
        return __('sidebar.gallery_images') ?: 'Gallery Images';
    }

    public static function getPluralModelLabel(): string
    {
        return __('sidebar.gallery_images') ?: 'Gallery Images';
    }

    public static function getModelLabel(): string
    {
        return __('sidebar.gallery_image') ?: 'Gallery Image';
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Photo;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return GalleryImageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GalleryImageTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGalleryImages::route('/'),
            'create' => CreateGalleryImage::route('/create'),
            'edit' => EditGalleryImage::route('/{record}/edit'),
        ];
    }
}
