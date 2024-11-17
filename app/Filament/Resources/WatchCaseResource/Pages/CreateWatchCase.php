<?php

namespace App\Filament\Resources\WatchCaseResource\Pages;

use App\Filament\Resources\WatchCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWatchCase extends CreateRecord
{
    protected static string $resource = WatchCaseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
