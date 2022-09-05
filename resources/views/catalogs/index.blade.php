@extends('layouts.app')
@section('content')
    <div class="container">
        {{ Form::open(['url' => route('products.index'), 'method' => 'GET']) }}

        <div class="row">
            <div class="col-lg-6">
                @include('components.inputs.input',[
                'name' => 'search',
                'label' => 'Поиск'
                ])
            </div>
            <div class="col-lg-3">
                @isset($categories)
                    @include('components.inputs.select',[
        'list' => $categories,
        'name' => 'categories',
        'items' => array_keys($categories->toArray()),
        'label' => 'Категории'
    ])
                @endisset
            </div>
            <div class="col-lg-3 my-1 align-self-end">
                <button type="submit" class="btn btn-secondary">Поиск</button>
                <a class="btn btn-success" href="{{ route('products.index') }}">Сбросить</a>
            </div>
        </div>
        {{ Form::close() }}
        <div class="row" style="color:black">
            @foreach($products as $product)
                <div class="col-lg-3 mb-3">
                    <div class="card">


                        <img src="{{ $product->getImagePublicPath() }}"
                             width="{{ $product->getImageWidth() }}" class="card-img-top"
                             alt="{{ $product->getImageAlt() }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->getName() }}</h5>
                            <p class="card-text">{{ $product->getDescription() }}</p>
                            <div class="row">
                                <div class="col-lg-2">
                                    {{ Form::open(['url' => route('shop.cart.update'), 'method' => 'PATCH']) }}
                                    {{ Form::hidden('product_id',$product->getKey()) }}
                                    @if($product->count_in_cart > 0)
                                        <button class="btn btn-success" disabled>Товар уже в корзине</button>
                                    @else
                                        <button class="btn btn-success">+</button>
                                    @endif
                                    {{ Form::close() }}
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{ route('catalog.show', $product) }}" class="btn btn-primary">show</a>
                                </div>
                                <div class="col-lg-4">
                                    {{ $product->getPriceFormatted() }}
                                </div>
                                <div class="col-lg-3" style="color:red;background: blueviolet">
                                    {{ $product->getPriceWithDiscount() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        @if(isset($products))
            @include('components.pagination',[
                'paginator' => $products,
                'paginatorValue' => 12,
            ])
        @endif
        @endsection
    </div>
