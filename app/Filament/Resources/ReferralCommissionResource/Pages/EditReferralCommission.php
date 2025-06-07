<?php

namespace App\Filament\Resources\ReferralCommissionResource\Pages;

use App\Filament\Resources\ReferralCommissionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReferralCommission extends EditRecord
{
    protected static string $resource = ReferralCommissionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
