@extends('layouts.app')
@section('content')



    @if(isset($products) and $products->total() > 12)
        @include('components.pagination',[
            'paginator' => $products,
            'paginatorValue' => 12,
        ])
    @endif
@endsection
