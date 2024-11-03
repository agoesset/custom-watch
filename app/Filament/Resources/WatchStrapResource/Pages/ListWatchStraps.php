<?php

namespace App\Filament\Resources\WatchStrapResource\Pages;

use App\Filament\Resources\WatchStrapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWatchStraps extends ListRecords
{
    protected static string $resource = WatchStrapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
