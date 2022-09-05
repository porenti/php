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
                @if(auth()->user()->hasRole('admin'))
                    <a class="btn btn-primary" href="{{ route('products.create') }}">Создать</a>
                @endif
            </div>
        </div>
        {{ Form::close() }}


        <div class="row mb-3">
            <div class="col-lg-2">Наименование</div>
            <div class="col-lg-3">Описание</div>
            <div class="col-lg-2">Цена</div>
            <div class="col-lg-2">Цена со скидкой</div>
        </div>
        @foreach($products as $product)
            <hr>
            <div class="row mb-4">
                <div class="col-lg-2">
                    {{ $product->getName() }}
                </div>
                <div class="col-lg-3">
                    {{ $product->getDescription() }}
                </div>
                <div class="col-lg-2">
                    {{ $product->getPrice() }}
                </div>
                <div class="col-lg-2">
                    {{ $product->getPriceWithDiscount() }}
                </div>
                <div class="col-lg-3">
                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary">show</a>

                @if(auth()->user()->hasRole('admin'))

                        <a class="btn btn-danger" href="{{ route('products.edit', $product) }}">Изменить</a>
                    </div>
                @endif
            </div>
        @endforeach


        @if(isset($products))
            @include('components.pagination',[
                'paginator' => $products,
                'paginatorValue' => 12,
            ])
        @endif
        @endsection
    </div>
