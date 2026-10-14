<?php

namespace App\Filament\Exports;

use App\Models\Visit;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class VisitExporter extends Exporter
{
    protected static ?string $model = Visit::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('visitors')->label('Посетител/и'),
            ExportColumn::make('children_names')->label('Деца'),
            ExportColumn::make('visit_code')->label('Код на Посетител'),
            ExportColumn::make('prisoner_num')->label('Број на затвореник'),
            ExportColumn::make('declared_items')->label('Предмети'),
            ExportColumn::make('date')->label('Дата'),
            ExportColumn::make('time')->label('Време'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your visit export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
