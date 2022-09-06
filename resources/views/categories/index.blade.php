@extends('layouts.maintemple')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8">
  {{ Form::open(['url' => route('categories.index'), 'method' => 'GET']) }}

      @include('components.inputs.input',[
      'name' => 'search'
      ])
      <button type="submit" class="btn btn-secondary">Поиск</button>
  </div>
  {{ Form::close() }}
  </div>
  <a class="btn btn-success" href="{{ route('categories.index') }}">Сбросить</a>
  <a class="btn btn-primary" href="{{ route('categories.create') }}">Создать</a>

  <div class="row">
  @foreach($categories as $category)
    <div class="row mt-3">
    <div class="col-lg-1">
      {{$category->getKey()}}
    </div>
    <div class="col-lg-3">
      {{$category->getName()}}
    </div>
    <div class="col-lg-3">
      <a class="btn btn-primary" href="{{ route('categories.edit', $category) }}">Редактировать</a>

    <button class="btn btn-danger" form="delete_category{{ $category->getKey() }}" onclick="return confirm('Вы уверены, что хотите удалить роль?')">
      Удалить
    </button>

    {{ Form::open(['url' => route('categories.destroy', $category), 'method' => 'DELETE', 'id' => 'delete_category'.$category->getKey()]) }}
    {{ Form::close() }}
  </div>
</div>
    @endforeach
</div>
</div>




@endsection
