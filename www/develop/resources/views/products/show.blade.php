@extends('layouts.maintemple')

@section('content')

<div class="card" style="color:black">
    <div class="card-header">
        {{ $product->getName() }}
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>{{$product->getDescription()}}</p>
            <footer style="color:gray">Категория: "{{$product->getCategory()->getName()}}"</footer>
            <footer class="blockquote-footer mt-2">Цена: {{$product->getPrice()}}</footer>
        </blockquote>
    </div>
</div>
@if(auth()->user()->hasRole('admin'))
<div style="text-align: center">
    <div class="mt-2 btn-group">
        <a class="btn btn-secondary" href="{{ route('products.edit', $product) }}"> Править </a>

        <form method="POST" action="{{ route('products.destroy', $product) }}">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger" type="submit"> Удалить</button>
        </form>
    </div>
</div>
@endif

@endsection
