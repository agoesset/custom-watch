<?php

namespace App\Filament\Resources\WatchDialResource\Pages;

use App\Filament\Resources\WatchDialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWatchDials extends ListRecords
{
    protected static string $resource = WatchDialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
