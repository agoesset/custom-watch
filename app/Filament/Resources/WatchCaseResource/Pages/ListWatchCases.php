<?php

namespace App\Filament\Resources\WatchCaseResource\Pages;

use App\Filament\Resources\WatchCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWatchCases extends ListRecords
{
    protected static string $resource = WatchCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
