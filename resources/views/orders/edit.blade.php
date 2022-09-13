
@extends('layouts.maintemple')
@section('content')
<h2 style="text-align: center"> Меняются данные в заказе, а не пользователя</h2>
    {{ Form::model($order, ['url' => route('order.update', $order), 'method'=>'PATCH']) }}
<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-4">
                @include('components.inputs.input',[
                    'name' => 'first_name',
                    'label' => 'Имя'
                ])
            </div>
            <div class="col-lg-4">
                @include('components.inputs.input',[
                    'name' => 'last_name',
                    'label' => 'Фамилия'
                ])
            </div>
            <div class="col-lg-4">

                @include('components.inputs.input',[
                    'name' => 'middle_name',
                    'label' => 'Отчество'
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('components.inputs.input',[
                    'name' => 'subtotal_amount',
                    'label' => 'Сумма товаров'
                ])
            </div>
            <div class="col-lg-3">
                @include('components.inputs.input',[
                    'name' => 'delivery_price',
                    'label' => 'Стоимость доставки'
                ])
            </div>
            <div class="col-lg-3">
                @include('components.inputs.input',[
                    'name' => 'total_sale',
                    'label' => 'Общая скидка'
                ])
            </div>
            <div class="col-lg-3">
                @include('components.inputs.input',[
                    'name' => 'total_amount',
                    'label' => 'Итоговая цена'
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                @include('components.inputs.input',[
                    'name' => 'phone',
                    'label' => 'Номер телефона'
                ])</div>
            <div class="col-lg-6">
                @include('components.inputs.input',[
                    'name' => 'email',
                    'label' => 'Почта'
                ])</div>
        </div>
        <div class="row">
            @include('components.inputs.DadataInput',[
    'object' => $order,
    ])
        </div>
    </div>

    <div class="col-lg-4">
        <div class="row">
            @include('components.inputs.select', [
           'name' => 'paymentMethod',
           'label' => 'Способ оплаты',
           'items' => $paymentMethods->toArray(),
           'list' => $paymentMethods,
       ])
        </div>
        <div class="row mb-3">
            @include('components.inputs.select', [
            'name' => 'deliveries',
            'label' => 'Способ доставки',
            'items' => array_keys($deliveries->toArray()),
            'list' => $deliveries,
        ])
        </div>
        <div class="row">
            <div class="col-lg-8">
                @foreach($order->getCoupons() as $coupon)
                    <div class="row">
                        <div class="col-lg-10">
                            {{ $coupon->getName() }}
                        </div>
                        <div class="col-lg-2">
                            X
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <button class="btn btn-success">
                    Редактировать
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    @foreach($order->getOrderItems() as $cartItem)
        <div class="col-lg-3">
            <div class="card" style="color:black">
                <div class="card-header">
                    <label> {{$cartItem->getName()}} </label>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <button>Удалить</button>
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="{{$cartItem->getQuantity()}}"
                                   type="number"
                                   name="quantity"
                                   class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{ Form::close() }}
@endsection