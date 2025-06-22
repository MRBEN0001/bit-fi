<?php

namespace App\Filament\Resources;

use App\Models\Kyc;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KycResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KycResource\RelationManagers;


class KycResource extends Resource
{
    protected static ?string $model = Kyc::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('dob'),
                Forms\Components\TextInput::make('address'),
                Forms\Components\TextInput::make('city'),
                Forms\Components\TextInput::make('state'),
                Forms\Components\TextInput::make('zip'),
                Forms\Components\TextInput::make('id_type'),
                Forms\Components\FileUpload::make('id_front')->image(),
                Forms\Components\FileUpload::make('id_back')->image(),
                Forms\Components\FileUpload::make('passport_photo')->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('User'),
                TextColumn::make('dob')->date(),
                TextColumn::make('city'),
                TextColumn::make('state'),
                TextColumn::make('zip'),
                TextColumn::make('id_type')->label('ID Type'),
            
            // Display custom public path images
            // ImageColumn::make('id_front')
            //     ->label('ID Front')
            //     ->url(fn ($record) => asset($record->id_front)),

                ImageColumn::make('id_front')
                ->label('ID Front')
                ->getStateUsing(fn ($record) => asset($record->id_front)),
            
            ImageColumn::make('id_back')
                ->label('ID Back')
                ->getStateUsing(fn ($record) => asset($record->id_back)),
            
            ImageColumn::make('passport_photo')
                ->label('Passport')
                ->getStateUsing(fn ($record) => asset($record->passport_photo)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKycs::route('/'),
            'create' => Pages\CreateKyc::route('/create'),
            'edit' => Pages\EditKyc::route('/{record}/edit'),
        ];
    }    
}
