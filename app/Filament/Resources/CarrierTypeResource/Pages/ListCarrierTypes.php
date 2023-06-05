<?php

namespace App\Filament\Resources\CarrierTypeResource\Pages;

use App\Filament\Resources\CarrierTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarrierTypes extends ListRecords
{
    protected static string $resource = CarrierTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
