<?php

namespace App\Filament\Widgets;

use App\Models\Activities;
use App\Filament\Resources\Activities\ActivitiesResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class RecentActivitiesWidget extends TableWidget
{
    protected static ?int $sort = 4;
    
    protected static ?string $heading = 'Recent Activities';

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('sidebar.recent') . ' ' . __('sidebar.activities'))
            ->query(Activities::query()->latest()->limit(5))
            ->columns([
                ImageColumn::make('image_url')->label(__('sidebar.image')),
                TextColumn::make('title')->label(__('sidebar.title')),
            ])
            ->paginated(false)
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('view_all')
                    ->label(__('sidebar.view'))
                    ->url(ActivitiesResource::getUrl('index'))
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
