@extends('layouts.maintemple')
@section('content')
<div class="container" style="color:black;">
<div class="row">
<div class="col-lg-9">
  <div class="row">
  @foreach($products as $product)
  <div class="col-lg-3 mb-3">
  <div class="card">

    @if(auth()->user()->hasRole('admin'))
    <div class="col-1">
        <a class="btn btn-danger" href="{{ route('products.edit', $product) }}">Изменить</a>
    </div>
    @endif
    <img src="" class="card-img-top" alt="Тут обязательно будет картинка">

    <div class="card-body">
      <h5 class="card-title">{{ $product->getName() }}</h5>
      <p class="card-text">{{ $product->getDescription() }}</p>
      <div class="row">
      <div class="col-lg-6">
        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">show</a>
      </div>
      <div class="col-lg-5">
      {{ $product->getPrice() }}
      </div>
      </div>
    </div>
    </div>
  </div>
  @endforeach
  </div>
</div>
<div class="col-lg-2">
  {{ Form::open(['url' => route('products.index'), 'method' => 'GET']) }}
  <div class="col-lg-100">
      @include('components.inputs.input',[
      'name' => 'search'
      ])
      @isset($categories)

          <div class="col-lg-100">
              <select class="form-select" name="category" aria-label="Default select example">
                  @foreach($categories as  $category)
                  <!-- почему-то юникод начал ворчать от записи через $categories as $id=>$name -->

                      <option value="{{ $category->getKey() }}">{{ $category->getName() }}</option>
                  @endforeach
              </select>
          </div>
      @endisset
      <button type="submit" class="btn btn-secondary">Поиск</button>
  </div>
  {{ Form::close() }}
  <div class="col-lg-1">
      <a class="btn btn-success" href="{{ route('products.index') }}">Сбросить</a>
  </div>
  @if(auth()->user()->hasRole('admin'))
  <div class="col-1">
      <a class="btn btn-primary" href="{{ route('products.create') }}">Создать</a>
  </div>
  @endif
</div>
</div>

</div>


@if(isset($products))
    @include('components.pagination',[
        'paginator' => $products,
        'paginatorValue' => 12,
    ])
@endif
@endsection
