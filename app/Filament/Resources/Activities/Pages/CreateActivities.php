<?php

namespace App\Filament\Resources\Activities\Pages;

use App\Filament\Resources\Activities\ActivitiesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateActivities extends CreateRecord
{
    protected static string $resource = ActivitiesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
