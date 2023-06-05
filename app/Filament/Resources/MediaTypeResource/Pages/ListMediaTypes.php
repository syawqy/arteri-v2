<?php

namespace App\Filament\Resources\MediaTypeResource\Pages;

use App\Filament\Resources\MediaTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMediaTypes extends ListRecords
{
    protected static string $resource = MediaTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
