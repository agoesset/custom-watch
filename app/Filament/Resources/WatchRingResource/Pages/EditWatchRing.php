<?php

namespace App\Filament\Resources\WatchRingResource\Pages;

use App\Filament\Resources\WatchRingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWatchRing extends EditRecord
{
    protected static string $resource = WatchRingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
