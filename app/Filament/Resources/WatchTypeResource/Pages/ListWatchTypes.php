<?php

namespace App\Filament\Resources\WatchTypeResource\Pages;

use App\Filament\Resources\WatchTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWatchTypes extends ListRecords
{
    protected static string $resource = WatchTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
