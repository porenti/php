<?php
/**
 * @var \App\Models\Shop\CartItem $cartItem
 * @var \App\Models\Shop\Coupon $coupon
 * @var \App\Models\Shop\Cart $cart
 */
?>

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-between" style="color:black">
            <div class="col-lg-8">
                @isset($cartItems)
                    @foreach($cartItems as $cartItem)
                        <div class="row border p-2">
                            <div class="col-lg-3 mb-3">

                                <img src="{{ $cartItem->getProduct()->getImagePublicPath() }}"
                                     width="{{ $cartItem->getProduct()->getImageWidth() }}"
                                     alt="{{ $cartItem->getProduct()->getImageAlt() }}">
                            </div>
                            <div class="col-lg-4 ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h5 class="card-title">{{ $cartItem->getProductName() }}</h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <p class="card-text">{{ $cartItem->getProduct()->getDescription() }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="card-text .text-muted">
                                            Категория: {{ $cartItem->getCategoryName() }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                @if ($cartItem->getSubtotalAmount() !== $cartItem->getAmount())
                                    <div class="row">
                                        <del>{{ $cartItem->getSubtotalAmountDecorated() }}&nbsp;₽</del>
                                    </div>
                                    <div class="row">
                                        {{ $cartItem->getAmount() }} ₽
                                    </div>
                                @endif
                                @if ($cartItem->getSubtotalAmount() === $cartItem->getAmount())
                                    <div class="row">
                                        {{ $cartItem->getAmountDecorated() }} ₽
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="input-group mb-3">
                                        <div class="col-lg-4">
                                            {{ Form::open(['url' => route('shop.cart.edit')]) }}
                                            {{ Form::hidden('cart_item_id',$cartItem->getKey()) }}
                                            {{ Form::hidden('quantity', $cartItem->getQuantity()-1) }}
                                            <button class="btn btn-danger" type="submit" id="button-addon2">-</button>
                                            {{ Form::close() }}
                                        </div>
                                        <div class="col-lg-4">
                                            {{ Form::open(['url' => route('shop.cart.edit'), 'id' => 'form_id'.$cartItem->getKey()]) }}
                                            <input type="number"
                                                   name="quantity"
                                                   onchange="document.getElementById('form_id{{ $cartItem->getKey() }}').submit()"
                                                   class="form-control"
                                                   value="{{ $cartItem->getQuantity() }}"
                                                   placeholder="Кол-во"
                                                   min="1"
                                                   max="{{ $cartItem->getProduct()->getQuantity() }}"
                                                   aria-describedby="button-addon2">
                                            {{ Form::hidden('cart_item_id',$cartItem->getKey()) }}
                                            {{ Form::close() }}
                                        </div>
                                        <div class="col-lg-4">
                                            {{ Form::open(['url' => route('shop.cart.edit')]) }}
                                            {{ Form::hidden('cart_item_id',$cartItem->getKey()) }}
                                            {{ Form::hidden('quantity', $cartItem->checkQuantityInStorage())}}
                                            <button class="btn btn-success" type="submit" id="button-addon2">+</button>
                                            {{ Form::close() }}
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    {{ Form::open(['url' => route('shop.cart.remove'), 'method' => 'POST']) }}
                                    {{ Form::hidden('cart_item_id',$cartItem->getKey()) }}
                                    <button type="submit">Убрать</button>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
                @empty($cartItems)
                    Корзина пуста
                @endempty
            </div>
            <div class="col-lg-3 border">
                <div class="row">
                    <h4>Итог</h4>
                    <div class="p-2">

                        @isset($cartItems)
                            @foreach($cartItems as $cartItem)
                                <div class="row mb-3">
                                    <div class="col-lg-4">х{{ $cartItem->getQuantity() }}</div>
                                    <div class="col-lg-4">{{ $cartItem->getProduct()->getName() }}</div>
                                    <div
                                            class="col-lg-4 {{ $cartItem->getProduct()->getSale()===0 ? '' : 'text-danger' }}">
                                        {{ $cartItem->getProduct()->getSale()===0 ? $cartItem->getTotalAmountDecorated() : $cartItem->getTotalAmount() }}
                                        ₽
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                        @empty($cartItems)
                            Корзина пуста
                        @endempty
                        <div>
                            <h5>Сумма: {{ $cart->getDecoratedSubTotalAmount() }} ₽</h5>
                            <h5>Скидка: {{ $cart->getDecoratedTotalSale() }} ₽</h5>
                            @if ($cart->getDeliveryId()!==null)
                                <h5>Доставка: {{ $cart->getDeliveryPrice() }} ₽</h5>
                            @endif
                            <h4>Итого: {{ $cart->getCartSum() }} ₽</h4>
                        </div>
                        {{ Form::open(['method'=>'POST', 'url' => route('shop.cart.addcoupon'), 'id' => 'form_id']) }}
                        @csrf
                        <div class="mt-4">
                            @include('components.inputs.input',[
                                     'name' => 'coupon_name',
                                     'label' => 'Промокод',
                                    ])
                            <button type="submit" class="btn btn-secondary">Ввести промокод</button>
                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
                @if ($coupons->count() !== 0)
                    <div class="row mt-4 border">
                        @isset($coupons)
                            <div class="row">
                                <div class="col-4">
                                    Купон
                                </div>
                                <div class="col-3">
                                    Cкидка
                                </div>
                                <div class="col-2">

                                </div>
                            </div>
                            @foreach($coupons as $coupon)
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        {{ $coupon->getName() }}
                                    </div>
                                    <div class="col-3">
                                        {{ $coupon->pivot->value }}₽
                                    </div>
                                    <div class="col-2">


                                        {{ Form::open(['url' => route('shop.cart.removecoupon'), 'id' => 'form_id'.$coupon->getKey()]) }}

                                        <button type="submit" class="btn btn-secondary mb-3">Отменить</button>
                                        {{ Form::hidden('coupon_name',$coupon->getName()) }}
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                @endif
            </div>
        </div>


        <div class="row mt-5 justify-content-between" style="color:black">
            <div class="col-lg-6 border p-2">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h3>Личные данные</h3>
                    </div>
                    <div class="col-lg-6 text-center">
                        @if (!auth()->check())
                            <a class="btn btn-secondary btn-lg" href="{{ route('login') }}">Войти</a>
                        @endif
                    </div>
                </div>

                {{ auth()->user() ? 1 : 0}}
                fio adress telephon pochta
                <div class="row">
                    <div class="col-lg-4">
                        @include('components.inputs.input', [
    'label' => 'Фамилия',
    'name' => 'lName',
    'value' => auth()->check() ? auth()->user()->getLastName() : null,
])
                    </div>
                    <div class="col-lg-4">
                        @include('components.inputs.input', [
    'label' => 'Имя',
    'name' => 'fName',
    'value' => auth()->check() ? auth()->user()->getFirstName() : null,
])
                    </div>
                    <div class="col-lg-4">
                        @include('components.inputs.input', [
    'label' => 'Отчество',
    'name' => 'mName',
    'value' => auth()->check() ? auth()->user()->getMiddleName() : null,
])
                    </div>
                    <div class="col-lg-6">
                        @include('components.inputs.input', [
    'label' => 'Телефон',
    'name' => 'phone',
    'value' => auth()->check() ? auth()->user()->getPhone() : null,
])
                    </div>
                    <div class="col-lg-6">
                        @include('components.inputs.input', [
    'label' => 'Почта',
    'name' => 'email',
    'value' => auth()->check() ? auth()->user()->getEmail() : null,
])
                    </div>
                    <div class="col-lg-12">
                        @include('components.inputs.input', [
    'label' => 'Адресс',
    'name' => 'adress_id',
    'value' => auth()->check() ? auth()->user()->getMiddleName() : null,
])
                    </div>
                </div>
            </div>
            <div class="col-lg-5 border p-2">
                <h3 style="text-align: center">Выберите способ доставки</h3>
                <div class="row">
                    @foreach($deliveries as $delivery)
                        <div class="col-lg-4">
                            {{ Form::open(['url' => route('shop.cart.editdelivery'), 'id' => 'form_id'.$delivery->getKey()]) }}
                            {{ Form::hidden('delivery_id',$delivery->getKey()) }}
                            <div class="btn-group-vertical" role="group">
                                <button type="submit"
                                        class="btn btn-lg {{ $delivery->getKey() === $cart->getDeliveryId() ? 'active btn-success' : 'btn-secondary' }}">
                                    {{$delivery->getName()}}</button>

                                <button type="submit"
                                        class="btn {{ $delivery->getKey() === $cart->getDeliveryId() ? 'active btn-outline-success' : 'btn-outline-secondary' }}">{{ $delivery->getPrice() }}
                                    ₽
                                </button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
