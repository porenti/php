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
                                <div class="col-lg-5">
                                    {{ Form::open(['url' => route('shop.cart.update'), 'method' => 'PATCH']) }}
                                    {{ Form::hidden('product_id',$product->getKey()) }}
                                        <button type="button"  value="{{ $product->getKey() }}" class="js-add-item-button btn btn-success {{ $product->count_in_cart > 0 ? 'disabled' : '' }}">
                                            {{ $product->count_in_cart > 0 ? 'Добавлен' : '+' }}
                                        </button>
                                    {{ Form::close() }}
                                </div>
                                <div class="col-lg-4">
                                    <a href="{{ route('catalog.show', $product) }}" class="btn btn-primary">show</a>
                                </div>
                                <div class="col-lg-3" >
                                    <del>{{ $product->getPriceWithDiscount() !== 0 ? $product->getPriceFormatted() : '' }}</del>
                                    <label style="{{ $product->getPriceWithDiscount() !== 0 ? 'color:red' : '' }}">
                                        {{ $product->getPriceWithDiscount() !== 0 ? $product->getPriceWithDiscount() : $product->getPriceFormatted() }}
                                    </label>
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
    </div>
@endsection