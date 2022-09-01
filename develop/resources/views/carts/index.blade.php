<?php

    /**
     * @var \App\Models\Shop\CartItem $cartsProduct
     */
    ?>


@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-between" style="color:black">
            <div class="col-lg-8">
                @foreach($productsInCarts as $cartsProduct)
                    <div class="row border p-2">
                        <div class="col-lg-3 mb-3">

                            <img src="{{ $cartsProduct->getProduct()->getImagePublicPath() }}"
                                 width="{{ $cartsProduct->getProduct()->getImageWidth() }}"
                                 alt="{{ $cartsProduct->getProduct()->getImageAlt() }}">
                        </div>
                        <div class="col-lg-4 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="card-title">{{ $cartsProduct->getProduct()->getName() }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="card-text">{{ $cartsProduct->getProduct()->getDescription() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="row">
                                <del>{{ $cartsProduct->getSubtotalAmount()*$cartsProduct->getQuantity() }} ₽</del>
                            </div>
                            <div class="row">
                                {{ $cartsProduct->getAmount() }} ₽
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="row">
                            <div class="input-group mb-3">
                                <div class="col-lg-4">
                                {{ Form::open(['url' => route('shop.cart.edit')]) }}
                                    {{ Form::hidden('CartItemKey',$cartsProduct->getKey()) }}
                                    {{ Form::hidden('quantity', $cartsProduct->getQuantity()-1) }}
                                <button class="btn btn-danger" type="submit" id="button-addon2">-</button>
                                {{ Form::close() }}
                                </div>
                                <div class="col-lg-4">
                                {{ Form::open(['url' => route('shop.cart.edit')]) }}
                                <input type="number" name="quantity" class="form-control" value="{{ $cartsProduct->getQuantity() }}" placeholder="Кол-во" aria-describedby="button-addon2">
                                    {{ Form::hidden('CartItemKey',$cartsProduct->getKey()) }}
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Изменить</button>
                                {{ Form::close() }}
                                </div>
                                <div class="col-lg-4">
                                    {{ Form::open(['url' => route('shop.cart.edit')]) }}
                                    {{ Form::hidden('CartItemKey',$cartsProduct->getKey()) }}
                                    {{ Form::hidden('quantity', $cartsProduct->getQuantity()+1) }}
                                    <button class="btn btn-success" type="submit" id="button-addon2">+</button>
                                    {{ Form::close() }}
                                {{ Form::close() }}
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                {{ Form::open(['url' => route('shop.cart.remove'), 'method' => 'POST']) }}
                                {{ Form::hidden('ProductKey',$cartsProduct->getProduct()->getKey()) }}
                                    <button  type="submit">Убрать</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-3 border ml-12">
                <h4>Итог</h4>
                <div class="p-2">
                    @foreach($productsInCarts as $cartsProduct)
                        <div class="row mb-3">
                            <div class="col-lg-4">х{{ $cartsProduct->getQuantity() }}</div>
                            <div class="col-lg-4">{{ $cartsProduct->getProduct()->getName() }}</div>
                            <div
                                class="col-lg-4 {{ $cartsProduct->getProduct()->getSale()===0 ? '' : 'text-danger' }}">{{ $cartsProduct->getAmount() }} ₽</div>
                        </div>
                    @endforeach
                    <h5>Сумма: {{ $cart->getTotalAmount() }} ₽</h5>
                        <h6>Сумма без скидки: {{ $cart->getSubtotalAmount() }} ₽</h6>
                        <h7>Скидка составила: {{ $cart->getTotalSale() }} ₽</h7>
                    <div>
                        <button>Перейти к оформлению</button>
                    </div>
                </div>


            </div>


        </div>
    </div>

    @if(isset($productsInCarts))
    @include('components.pagination',[
        'paginator' => $productsInCarts,
        'paginatorValue' => 12,
    ])
    @endif

    @endsection
    </div>
