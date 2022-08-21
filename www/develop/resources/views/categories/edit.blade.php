@extends('layouts.maintemple')

@section('content')

    <div class="container">
        {{ Form::model($category,['url' => route('categories.update', $category), 'method' => 'PATCH']) }}
        @include('categories.forms.form')



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
