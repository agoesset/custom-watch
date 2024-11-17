<?php

namespace App\Filament\Resources\WatchStrapResource\Pages;

use App\Filament\Resources\WatchStrapResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWatchStrap extends EditRecord
{
    protected static string $resource = WatchStrapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
