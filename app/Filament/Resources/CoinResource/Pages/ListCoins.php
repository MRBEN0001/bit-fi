<?php

namespace App\Filament\Resources\CoinResource\Pages;

use App\Filament\Resources\CoinResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoins extends ListRecords
{
    protected static string $resource = CoinResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
