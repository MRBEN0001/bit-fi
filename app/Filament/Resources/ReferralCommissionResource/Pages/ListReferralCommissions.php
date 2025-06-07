<?php

namespace App\Filament\Resources\ReferralCommissionResource\Pages;

use App\Filament\Resources\ReferralCommissionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReferralCommissions extends ListRecords
{
    protected static string $resource = ReferralCommissionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
