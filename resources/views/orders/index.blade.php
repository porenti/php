<?php

?>
@extends('layouts.app')
@section('content')
    <div class="text-black">
        @foreach($orders as $order)
            <div class=" mt-5 mb-5">
                <div class="row">
                    <div class="col-lg-3 border">
                        Номер заказа: {{ $order->getKey() }}
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3" style="background-color: {{ $order->getStatus()->getStyle() }}">
                        {{ $order->getStatus()->getName() }}
                    </div>
                </div>
                <div class="row border">
                    <div class="col-lg-4">
                        Информация о доставке
                        <hr>
                        Адресс доставки
                        {{ $order->getAddresses()->getFullAddress() }}
                        <hr>
                        Доставит
                        {{ $order->getDelivery()->getName() }}
                    </div>

                    <div class="col-lg-3">
                        Товарный список
                        <hr>
                        @foreach($order->getOrderItems() as $orderItem)
                            <div class="row">

                                <div class="col-lg-4">{{ $orderItem->getName() }}</div>
                                <div class="col-lg-4">x{{ $orderItem->getQuantity() }}</div>
                                <div class="col-lg-4 " style="text-align: right">
                                    {{ $orderItem->getAmount() }}&nbsp;₽
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-lg-2">
                        Промокодный список
                        <hr>
                        @foreach($order->getCoupons() as $coupon)
                            <div class="row">
                                <div class="col-lg-6">{{$coupon->getName()}}</div>
                                <div class="col-lg-6">{{$coupon->getValue() }}₽</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-3 border " style="text-align: right">
                        <h5>Сумма: {{ $order->getSubtotalAmount() }} ₽</h5>
                        <h5>Скидка: {{ $order->getTotalSale() }} ₽</h5>
                        <h5>Доставка: {{ $order->getDeliveryPrice() }} ₽</h5>
                        <h4 class="border">Итого: {{ $order->getTotalAmount() }} ₽</h4>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
@endsection