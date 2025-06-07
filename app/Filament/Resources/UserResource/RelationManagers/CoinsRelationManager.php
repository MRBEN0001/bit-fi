<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class CoinsRelationManager extends RelationManager
{
    protected static string $relationship = 'coins';

    protected static ?string $recordTitleAttribute = 'wallet_address';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('wallet_address')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('wallet_address'),
                Tables\Columns\TextColumn::make('companyWallet.coin'),
                Tables\Columns\TextColumn::make('balance'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),

                Action::make('Update Wallet Balance')->form([
                    Select::make('operation')
                        ->label('Operation')
                        ->options([
                            'add' => 'Add',
                            'subtract' => 'Subtract',
                        ])
                        ->required(),
                    TextInput::make('amount')
                        ->label('Amount')
                        ->numeric()
                        ->required()
                ])->action(function ($record, array $data) {
                    $amount = $data['amount'];
                    $operation = $data['operation'];

                    // Determine the new balance based on the selected operation
                    if ($operation === 'add') {
                        $record->update([
                            'balance' => $record->balance + $amount
                        ]);
                        $investorAccount = $record->user->account;
                        $investorAccount->update([
                            'balance' => $investorAccount->balance + $amount,
                        ]);
                    } elseif ($operation === 'subtract') {
                        if ($record->balance >= $amount) {
                            $record->update([
                                'balance' => $record->balance - $amount
                            ]);
                            $investorAccount = $record->user->account;
                            $investorAccount->update([
                                'balance' => $investorAccount->balance - $amount,
                            ]);
                        } else {
                            Notification::make()
                                ->title('Insufficient Balance')
                                ->warning()
                                ->send();
                            return;
                        }
                    }

                    Notification::make()
                        ->title('Balance Update Successful')
                        ->success()
                        ->send();
                })


            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    public static function query(): Builder
    {
        return parent::query()->with('coins.companyWallet');
    }
}
