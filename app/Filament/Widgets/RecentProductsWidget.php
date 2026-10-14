<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use App\Models\Product;

class RecentProductsWidget extends TableWidget
{
    protected static ?int $sort = 5;
    
    protected static ?string $heading = 'Recent Products';

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('sidebar.recent') . ' ' . __('sidebar.products'))
            ->query(fn (): Builder => Product::query())
            ->columns([
                ImageColumn::make('image_url')->label(__('sidebar.image')),
                TextColumn::make('title')->label(__('sidebar.title')),
                TextColumn::make('category.title')->label(__('sidebar.category')),
            ])
            ->paginated(false)
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('view_all')
                    ->label(__('sidebar.view'))
                    ->url(ProductResource::getUrl('index'))
                    ->button(),
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
