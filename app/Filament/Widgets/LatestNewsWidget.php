<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\News\NewsResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use App\Models\News;

class LatestNewsWidget extends TableWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';
    
    protected static ?string $heading = 'Latest News';

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('sidebar.recent') . ' ' . __('sidebar.news'))
            ->query(News::query()->latest()->limit(5))
            ->columns([
                TextColumn::make('title')->label(__('sidebar.title')),
                TextColumn::make('created_at')->label(__('sidebar.created_at'))->date(),
                TextColumn::make('description')
                    ->label(__('sidebar.description'))
                    ->sortable()
                    ->searchable()
                    ->limit(80),
            ])
            ->paginated(false)
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('view_all')
                    ->label(__('sidebar.view'))
                    ->url(NewsResource::getUrl('index'))
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
