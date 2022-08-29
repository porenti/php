<?php
/**
 * @var \App\Models\Images\Image $image
 */
?>

@extends('layouts.maintemple')

@section('content')

    <div class="container">
        {{ Form::model($product,['url' => route('products.update', $product), 'method' => 'PATCH', 'files' => true]) }}


        <div class="row">
            <div class="col-12">
                @if(null !== $image)
                    <img src="{{ $image->getPublicPath() }}" alt="{{ $image->getAlt() }}" width="{{ $image->getWidth() }}">
                @endif
                <label>
                    Картинка
                    <input type="file" class="form-control" name="avatar">
                </label>
            </div>
        </div>



        @include('products.forms.form')



        <select name="category_id" class="form-control mb-3 mt-3">
            @foreach($categories as $category)
                <option value="{{ $category->getKey() }}">{{ $category->getName() }}</option>
            @endforeach
        </select>

        <div class="row my-1">
            <div class="col-12">
                <button class="btn btn-success">
                    Сохранить
                </button>
            </div>
        </div>

        {{ Form::close() }}
    </div>

@endsection
