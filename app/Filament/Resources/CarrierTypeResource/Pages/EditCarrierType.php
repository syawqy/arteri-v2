<?php

namespace App\Filament\Resources\CarrierTypeResource\Pages;

use App\Filament\Resources\CarrierTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarrierType extends EditRecord
{
    protected static string $resource = CarrierTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
