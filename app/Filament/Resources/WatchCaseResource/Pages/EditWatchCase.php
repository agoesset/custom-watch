<?php

namespace App\Filament\Resources\WatchCaseResource\Pages;

use App\Filament\Resources\WatchCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWatchCase extends EditRecord
{
    protected static string $resource = WatchCaseResource::class;

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
