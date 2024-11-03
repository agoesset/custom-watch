<?php

namespace App\Filament\Resources\WatchDialResource\Pages;

use App\Filament\Resources\WatchDialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWatchDial extends EditRecord
{
    protected static string $resource = WatchDialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
