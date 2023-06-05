<?php

namespace App\Filament\Resources\RecordDataResource\Pages;

use App\Filament\Resources\RecordDataResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecordData extends EditRecord
{
    protected static string $resource = RecordDataResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
