<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Shop\Address;
use App\Models\Shop\Coupon;
use App\Models\Shop\Delivery;
use App\Models\Shop\Order;
use App\Models\Shop\PaymentMethod;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('payment_method_id')
                    ->label('Способ оплаты')
                    ->options(PaymentMethod::pluck('name', 'id'))
                    ->searchable(),
                Select::make('delivery_id')
                    ->label('Способ доставки')
                    ->options(Delivery::pluck('name', 'id'))
                    ->searchable(),
                TextInput::make('address_id')
                    ->label('Адресс')
                    ->afterStateHydrated(function (TextInput $component, $state) {
                        $address = Address::find($state)?->getFullAddress();
                        $component->state($address);
                    })
                    ->afterStateUpdated(function (\Closure $set, string $state) {
                        $address = Address::firstOrCreate([
                            'full_address' => $state,
                        ],
                            ['country_id' => 1,
                                'region_id' => 1,
                                'city_id' => 1,
                                'street_id' => 1,
                                'house_id' => 1]);

                        $set('address_id', $address->getKey());
                    }),
                TextInput::make('email')
                    ->label('Почта'),
                TextInput::make('phone')
                    ->label('Номер телефона'),
                TextInput::make('first_name')
                    ->label('Фамилия'),
                TextInput::make('last_name')
                    ->label('Имя'),
                TextInput::make('middle_name')
                    ->label('Отчество'),
                TextInput::make('subtotal_amount')
                    ->label('Сумма товаров'),

                TextInput::make('total_sale')
                    ->label('Общая скидка'),
                    /*->afterStateUpdated(function (TextInput $component, $state, \Closure $get, \Closure $set) {
                        dd($get('delivery_id'));
                        $set('delivery_price', $state+123);
                        $set('total_amount', $state+123);

//                        dd($get('email'));
//                        $orderId = $component->getContainer()->getLivewire()->data['id'];
//                        $value = Order::find($orderId);
//                        $component->state($value['total_sale']);
                    }),*/
                TextInput::make('total_amount')
                    ->label('Итоговая цена'),
                TextInput::make('delivery_price')
                    ->reactive()

                    ->label('Стоимость доставки'),
                Forms\Components\MultiSelect::make('coupons')
                    ->relationship('coupons', 'name')
                    ->label('Купон')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->searchable()
                    ->label('Идентификатор пользователя')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Общая сумма')
                    ->searchable()
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\OrderItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
