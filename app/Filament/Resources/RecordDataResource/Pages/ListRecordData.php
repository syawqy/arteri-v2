<?php

namespace App\Filament\Resources\RecordDataResource\Pages;

use App\Filament\Resources\RecordDataResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecordData extends ListRecords
{
    protected static string $resource = RecordDataResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
