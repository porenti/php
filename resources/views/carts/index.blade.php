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
            <div class="col-lg-3 border ml-12">
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
                            <h5>Сумма: {{ $cart->getDecoratedTotalAmount() }} ₽</h5>
                            <h6>Сумма без скидки: {{ $cart->getDecoratedSubTotalAmount() }} ₽</h6>
                            <h7>Скидка составила: {{ $cart->getDecoratedTotalSale() }} ₽</h7>
                        </div>
                        {{ Form::open(['method'=>'POST', 'url' => route('shop.cart.addcoupon'), 'id' => 'form_id']) }}
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
            </div>
        </div>


    </div>
    </div>

@endsection
