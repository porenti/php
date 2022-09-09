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
                <div class="col-lg-3">
                    Тут когда-нибудь будет статус
                </div>
            </div>
            <div class="row border">
                <div class="col-lg-3">
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

                </div>

                <div class="col-lg-3">
                    Промокодный список
                    <hr>
                    {{ $order->getCoupons() }}

                </div>
                <div class="col-lg-3 border">
                    <h5>Сумма: {{ $order->getSubtotalAmount() }} ₽</h5>
                    <h5>Скидка: {{ $order->getTotalSale() }} ₽</h5>
                    <h5>Доставка: {{ $order->getDeliveryPrice() }} ₽</h5>
                    <h4 class="border">Итого: {{ $order->getTotalAmount() }} ₽</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-11"></div>
                <div class="col-lg-1">
                    <button class="btn btn-lg btn-success">Детали</button>
                </div>
            </div>
            </div>
        @endforeach


    </div>
@endsection