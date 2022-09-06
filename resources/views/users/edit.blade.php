<?php
/**
 * @var \App\Models\Images\Image $image
 */
?>
@extends('layouts.maintemple')
@section('content')



    {{ Form::open(['url' => route('users.update', $user), 'files' => true]) }}
    @csrf
    <div class="row">
        <div class="col-12">
            @if(null !== $image)
                <img src="{{ $image->getPublicPath() }}" alt="{{ $image->getAlt() }}" width="{{ $image->getWidth() }}">
            @endif
            <label>
                Аватар
                <input type="file" class="form-control" name="avatar">
            </label>
        </div>
    </div>

    @include('users.forms._form')
    <div class="text-center mb-3">
        @method("PUT")
        <button type="submit" href="{{ route('users.update', $user) }}" class="btn btn-secondary">Сохранить</button>
    </div>

    {{ Form::close() }}
@endsection
