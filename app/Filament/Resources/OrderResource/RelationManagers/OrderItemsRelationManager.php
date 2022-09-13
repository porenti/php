<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use App\Models\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class OrderItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'orderItems';

    protected static ?string $recordTitleAttribute = 'order_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('quantity')
                    ->required()
                    ->label('Количество')
                    ->integer(),
                TextInput::make('sale')
                    ->required()
                    ->label('Скидка'),
                TextInput::make('subtotal_amount')
                    ->required()
                    ->label('Сумма без скидки'),
                TextInput::make('amount')
                    ->required()
                    ->label('Итоговая сумма'),
                TextInput::make('name')
                    ->required()
                    ->label('Название'),
                TextInput::make('description')
                    ->required()
                    ->label('Описание'),

                Select::make('product_id')
                    ->label('Продукт')
                    ->options(Product::pluck('name', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('quantity'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
