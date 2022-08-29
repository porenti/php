@extends('layouts.maintemple')

@section('content')

    <div class="container">
        {{ Form::open(['url' => route('products.store')]) }}
        @include('products.forms.form')

        <select name="category_id" class="form-control mb-3 mt-3">
            @foreach($categories as $category)
                <option value="{{ $category->getKey() }}">{{ $category->getName() }}</option>
            @endforeach
        </select>

        <div class="row my-1">
            <div class="col-12">
                <button class="btn btn-success">
                    Создать
                </button>
            </div>
        </div>

        {{ Form::close() }}
    </div>

@endsection
