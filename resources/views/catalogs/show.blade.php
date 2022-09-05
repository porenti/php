@extends('layouts.app')

@section('content')

    <div class="card" style="color:black">
        <div class="card-header">
            {{ $product->getName() }}
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <div class="row">
                    <div class="col lg-6">
                        <div class="row">
                            <div class="col">
                                <p>{{$product->getDescription()}}</p>
                                <footer style="color:gray">Категория: "{{$product->getCategory()->getName()}}"</footer>
                                <footer class="blockquote-footer mt-2">Цена: {{$product->getPrice()}}</footer>
                                <footer class="blockquote-footer mt-2">Цена: {{$product->getPrice()}}</footer>
                                <footer class="blockquote-footer mt-2">Остаток на
                                    складе: {{$product->getQuantity()}}</footer>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{ Form::open(['url' => route('shop.cart.update'), 'method' => 'PATCH']) }}
                                {{ Form::hidden('product_id',$product->getKey()) }}
                                @if($availability)
                                    <button class="btn btn-success" disabled>Товар уже в корзине</button>
                                @else
                                    <button class="btn btn-success">Добавить в корзину</button>
                                @endif
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                    <div class="col lg-6">
                        <img src="{{ $product->getImagePublicPath() }}"
                             width="{{ $product->getImageWidth() }}" class="card-img-top"
                             alt="{{ $product->getImageAlt() }}">
                    </div>
                </div>
            </blockquote>
        </div>
    </div>

@endsection
