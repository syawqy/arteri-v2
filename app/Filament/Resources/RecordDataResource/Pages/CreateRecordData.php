<?php

namespace App\Filament\Resources\RecordDataResource\Pages;

use App\Filament\Resources\RecordDataResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRecordData extends CreateRecord
{
    protected static string $resource = RecordDataResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
    
        return $data;
    }
}
