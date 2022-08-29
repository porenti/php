@extends('layouts.maintemple')
@section('content')

    <form method="POST" action="{{  route('users.store')  }}">
        @csrf
        @include('users.forms._form')

        <div class="text-center mb-3">
            <button type="submit" class="btn btn-secondary">Создать</button>
        </div>


    </form>
@endsection
