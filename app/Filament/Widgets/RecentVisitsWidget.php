<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Visits\VisitResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use App\Models\Visit;

class RecentVisitsWidget extends TableWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';
    
    protected static ?string $heading = 'Recent Visits';

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('sidebar.recent') . ' ' . __('sidebar.visits'))
            ->query(Visit::query()->orderBy('date', 'desc')->limit(5))
            ->columns([
                TextColumn::make('date')->label('Датум')->date('Y-m-d'),
                TextColumn::make('time')->label('Термин'),
                TextColumn::make('prisoner_num')->label('Затвореник бр.'),
                TextColumn::make('visitors')->label('Посетител'),
                TextColumn::make('visit_code')->label('Код на Посетител'),
            ])
            ->paginated(false)
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('view_all')
                    ->label(__('sidebar.view')) // Change to your preferred text/translation
                    ->url(VisitResource::getUrl('index'))
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
