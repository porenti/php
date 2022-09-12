@extends('layouts.maintemple')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-1">Id</div>
            <div class="col-lg-2">Пользователь</div>
            <div class="col-lg-1">Доставка</div>
            <div class="col-lg-2">Промокоды</div>
            <div class="col-lg-1">Цена</div>
            <div class="col-lg-1">Способ оплаты</div>
            <div class="col-lg-2">Статус</div>
            <div class="col-lg-2">Управление</div>
        </div>
        @foreach($orders as $order)
            <hr>
            <div class="row mb-4">
                <div class="col-lg-1">
                    {{ $order->getKey() }}
                </div>
                <div class="col-lg-2">
                    {{ $order->getUserId() }}
                </div>
                <div class="col-lg-1">
                    {{ $order->getDelivery()->getName() }}
                </div>
                <div class="col-lg-2">
                    {{ $order->getCoupons()->count() }}
                </div>
                <div class="col-lg-1">
                    {{ $order->getTotalAmount() }}
                </div>
                <div class="col-lg-1">
                    {{ $order->getPaymentMethod()->getName() }}
                </div>
                <div class="col-lg-2">
                    {{ $order->getStatus()->getName() }}
                </div>
                <div class="col-lg-2">
                    <a href="" class="btn btn-primary">show</a>

                    <a class="btn btn-danger" href="{{ route('order.edit', $order) }}">Изменить</a>
                </div>

            </div>
        @endforeach

    </div>
        @endsection
