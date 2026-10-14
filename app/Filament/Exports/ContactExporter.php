<?php

namespace App\Filament\Exports;

use App\Models\Contact;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class ContactExporter extends Exporter
{
    protected static ?string $model = Contact::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')->label('Име'),
            ExportColumn::make('phone')->label('Телефон'),
            ExportColumn::make('email')->label('Е-Пошта'),
            ExportColumn::make('relationship')->label('Врска'),
            ExportColumn::make('message')->label('Порака'),
            ExportColumn::make('created_at')->label('Објавено на'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your contact export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
