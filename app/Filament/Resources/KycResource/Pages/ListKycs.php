<?php

namespace App\Filament\Resources\KycResource\Pages;

use App\Filament\Resources\KycResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKycs extends ListRecords
{
    protected static string $resource = KycResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
