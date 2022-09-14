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
                    ->hint(function (\Closure $get, \Closure $set) {
                        $text = "Остаток на складе: ";
                        $productId = $get('product_id');
                        if ($productId !== null) {
                            $quantity = Product::find($productId)->getQuantity();
                            $text = $text.$quantity;
                        } else {
                            $text = $text."-";
                        }
                        return $text;
                    })
                    ->integer()
                    ->reactive(),
                TextInput::make('sale')
                    ->required()
                    ->label('Скидка'),
                TextInput::make('subtotal_amount')
                    ->required()
                    ->label('Цена товара'),
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
                    ->searchable()
                    ->hint('Цены указываются на единицу товара')
                    ->reactive()
                    ->afterStateUpdated(function (\Closure $set, string $state, \Closure $get) {
                        $product = Product::find($state);
                        $set('description', $product->getDescription());
                        $set('name', $product->getName());
                        $set('sale', $product->getSale());
                        $amount = $product->getPrice();
                        $set('subtotal_amount', $amount);
                        $set('amount', $amount - $product->getSale());
                        //$set()
//                        $set('amoun', $product->get);
                    }),

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
