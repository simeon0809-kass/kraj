<?php

namespace App\Filament\Resources\SecurityLogs\Schemas;

use App\Models\SecurityLog;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SecurityLogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make(__('sidebar.event'))
                    ->columns(3)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('event')
                            ->label(__('sidebar.event'))
                            ->badge()
                            ->formatStateUsing(fn (string $state) => __('sidebar.event_'.$state)),
                        TextEntry::make('reference')->label(__('sidebar.reference'))->placeholder('—')->copyable(),
                        TextEntry::make('created_at')->label(__('sidebar.date_time'))->dateTime('Y-m-d H:i:s'),
                    ]),

                Section::make(__('sidebar.network'))
                    ->columns(2)
                    ->schema([
                        TextEntry::make('ip_address')->label(__('sidebar.ip_address'))->copyable(),
                        TextEntry::make('same_ip')
                            ->label(__('sidebar.same_ip_count'))
                            ->state(fn (SecurityLog $record) => SecurityLog::where('ip_address', $record->ip_address)
                                ->whereIn('event', ['visit_created', 'contact_submitted'])->count()),
                        TextEntry::make('forwarded_for')->label(__('sidebar.forwarded_for'))->placeholder('—')->columnSpanFull(),
                        TextEntry::make('accept_language')->label(__('sidebar.language'))->placeholder('—'),
                        TextEntry::make('locale')->label(__('sidebar.site_locale'))->placeholder('—'),
                    ]),

                Section::make(__('sidebar.device'))
                    ->columns(2)
                    ->schema([
                        TextEntry::make('device_type')->label(__('sidebar.device_type'))->badge()->placeholder('—'),
                        TextEntry::make('device_brand')->label(__('sidebar.device_brand'))->placeholder('—'),
                        TextEntry::make('browser')->label(__('sidebar.browser'))
                            ->state(fn (SecurityLog $r) => trim("{$r->browser} {$r->browser_version}") ?: null)->placeholder('—'),
                        TextEntry::make('os')->label(__('sidebar.operating_system'))
                            ->state(fn (SecurityLog $r) => trim("{$r->os} {$r->os_version}") ?: null)->placeholder('—'),
                        TextEntry::make('user_agent')->label(__('sidebar.user_agent'))->placeholder('—')->columnSpanFull()->copyable(),
                    ]),

                Section::make(__('sidebar.request'))
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('method')->label(__('sidebar.method')),
                        TextEntry::make('url')->label(__('sidebar.url'))->columnSpanFull(),
                        TextEntry::make('referer')->label(__('sidebar.referer'))->placeholder('—')->columnSpanFull(),
                        TextEntry::make('session_id')->label(__('sidebar.session'))->placeholder('—')->copyable(),
                        TextEntry::make('user.name')->label(__('sidebar.logged_user'))->placeholder('—'),
                    ]),
            ]);
    }
}
