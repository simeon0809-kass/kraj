<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Filament\Resources\Contacts\ContactResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;

class ContactInformationWidget extends TableWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';
    
    protected static ?string $heading = 'Recent Contacts';

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('sidebar.recent') . ' ' . __('sidebar.contacts'))
            ->query(Contact::query()->latest()->limit(5))
            ->columns([
                TextColumn::make('name')->label(__('sidebar.name')),
                TextColumn::make('phone')->label(__('sidebar.phone')),
                TextColumn::make('email')->label(__('sidebar.email')),
                TextColumn::make('relationship')->label(__('sidebar.relationship')),
                TextColumn::make('message')->label(__('sidebar.message'))->limit(50),
            ])
            ->paginated(false)
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('view_all')
                    ->label(__('sidebar.view'))
                    ->url(ContactResource::getUrl('index'))
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
