<?php

namespace App\Filament\Resources\WatchRingResource\Pages;

use App\Filament\Resources\WatchRingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWatchRings extends ListRecords
{
    protected static string $resource = WatchRingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
