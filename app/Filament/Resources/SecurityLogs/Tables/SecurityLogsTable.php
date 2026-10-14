<?php

namespace App\Filament\Resources\SecurityLogs\Tables;

use App\Models\SecurityLog;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SecurityLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->label(__('sidebar.date_time'))
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable(),
                TextColumn::make('event')
                    ->label(__('sidebar.event'))
                    ->badge()
                    ->formatStateUsing(fn (string $state) => __('sidebar.event_'.$state))
                    ->color(fn (string $state) => match ($state) {
                        'visit_created', 'login' => 'success',
                        'visit_cancelled', 'logout' => 'gray',
                        'login_failed' => 'danger',
                        default => 'info',
                    })
                    ->sortable(),
                TextColumn::make('reference')
                    ->label(__('sidebar.reference'))
                    ->searchable()
                    ->copyable()
                    ->placeholder('—'),
                TextColumn::make('ip_address')
                    ->label(__('sidebar.ip_address'))
                    ->searchable()
                    ->copyable()
                    ->sortable(),
                TextColumn::make('device_type')
                    ->label(__('sidebar.device_type'))
                    ->badge()
                    ->color('gray')
                    ->placeholder('—'),
                TextColumn::make('device_brand')
                    ->label(__('sidebar.device_brand'))
                    ->placeholder('—')
                    ->toggleable(),
                TextColumn::make('browser')
                    ->label(__('sidebar.browser'))
                    ->state(fn (SecurityLog $r) => trim("{$r->browser} {$r->browser_version}") ?: null)
                    ->searchable(['browser'])
                    ->placeholder('—'),
                TextColumn::make('os')
                    ->label(__('sidebar.operating_system'))
                    ->state(fn (SecurityLog $r) => trim("{$r->os} {$r->os_version}") ?: null)
                    ->searchable(['os'])
                    ->placeholder('—'),
                TextColumn::make('accept_language')
                    ->label(__('sidebar.language'))
                    ->limit(20)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user_agent')
                    ->label(__('sidebar.user_agent'))
                    ->limit(40)
                    ->tooltip(fn (SecurityLog $r) => $r->user_agent)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.name')
                    ->label(__('sidebar.logged_user'))
                    ->placeholder('—')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('event')
                    ->label(__('sidebar.event'))
                    ->options(collect(SecurityLog::EVENTS)->mapWithKeys(
                        fn (string $e) => [$e => __('sidebar.event_'.$e)]
                    )->all()),
                SelectFilter::make('device_type')
                    ->label(__('sidebar.device_type'))
                    ->options([
                        'desktop' => 'Desktop',
                        'mobile' => 'Mobile',
                        'tablet' => 'Tablet',
                        'bot' => 'Bot',
                    ]),
                Filter::make('today')
                    ->label(now()->format('Y-m-d'))
                    ->query(fn (Builder $q) => $q->whereDate('created_at', today())),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([]);
    }
}
