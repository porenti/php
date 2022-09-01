@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-between" style="color:black">
            <div class="col-lg-8">
                @foreach($productsInCarts as $cartsProduct)
                    <div class="row border p-2">
                        <div class="col-lg-3 mb-3">
                            <img src="{{ $cartsProduct->getProduct()->getImages()->last()->getPublicPath() }}"
                                 width="{{ $cartsProduct->getProduct()->getImages()->last()->getWidth() }}"
                                 alt="{{ $cartsProduct->getProduct()->getImages()->last()->getAlt() }}">
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
                                <del>{{ $cartsProduct->getSubtotalAmount() }}</del>
                            </div>
                            <div class="row">
                                {{ $cartsProduct->getAmount() }}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="row">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" value="{{ $cartsProduct->getQuantity() }}" placeholder="Кол-во" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Изменить</button>
                            </div></div>
                            <div class="row">
                                <button>Убрать</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-3 border ml-12">
                <h4>Итог</h4>
                <div class="p-2">
                    @foreach($productsInCarts as $cartsProduct)
                        <div class="row">
                            <div class="col-lg-4">х{{ $cartsProduct->getQuantity() }}</div>
                            <div class="col-lg-4">{{ $cartsProduct->getProduct()->getName() }}</div>
                            <div
                                class="col-lg-4 {{ $cartsProduct->getProduct()->getSale()===0 ? '' : 'text-danger' }}">{{ $cartsProduct->getAmount() }}</div>
                        </div>
                    @endforeach
                    <h5>Сумма: </h5>
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
