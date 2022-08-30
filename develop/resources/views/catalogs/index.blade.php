@extends('layouts.maintemple')
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


                        <img src="{{ $product->getImages()->last()->getPublicPath() }}" width="{{ $product->getImages()->last()->getWidth() }}" class="card-img-top" alt="{{ $product->getImages()->last()->getAlt() }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->getName() }}</h5>
                            <p class="card-text">{{ $product->getDescription() }}</p>
                            <div class="row">
                                <div class="col-lg-2">
                                    {{ Form::model($product,['url' => route('cart.update', $product), 'method' => 'PATCH']) }}

                                    <button class="btn btn-success">+</button>
                                    {{ Form::close() }}
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary">show</a>
                                </div>
                                <div class="col-lg-4">
                                    {{ $product->getPrice() }}
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
