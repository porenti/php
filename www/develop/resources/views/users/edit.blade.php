@extends('layouts.maintemple')
@section('content')

    <form method="PATCH" action="{{  route('users.update', $user)  }}">
        @csrf
        @method('patch')

        @include('users.forms._form')

        <div class="text-center mb-3">
            <button type="submit" class="btn btn-secondary">Сохранить</button>
        </div>


    </form>
@endsection
