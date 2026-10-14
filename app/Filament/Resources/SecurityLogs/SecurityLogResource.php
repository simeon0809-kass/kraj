<?php

namespace App\Filament\Resources\SecurityLogs;

use App\Filament\Resources\SecurityLogs\Pages\ListSecurityLogs;
use App\Filament\Resources\SecurityLogs\Pages\ViewSecurityLog;
use App\Filament\Resources\SecurityLogs\Schemas\SecurityLogInfolist;
use App\Filament\Resources\SecurityLogs\Tables\SecurityLogsTable;
use App\Models\SecurityLog;
use BackedEnum;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SecurityLogResource extends Resource
{
    protected static ?string $model = SecurityLog::class;

    public static function getNavigationLabel(): string
    {
        return __('sidebar.security_logs');
    }

    public static function getPluralModelLabel(): string
    {
        return __('sidebar.security_logs');
    }

    public static function getModelLabel(): string
    {
        return __('sidebar.security_log');
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ShieldCheck;

    // Read-only audit trail: only admins can see it, nobody can create, edit or delete entries.
    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public static function canView(Model $record): bool
    {
        return static::canViewAny();
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function infolist(Schema $schema): Schema
    {
        return SecurityLogInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SecurityLogsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSecurityLogs::route('/'),
            'view' => ViewSecurityLog::route('/{record}'),
        ];
    }
}
