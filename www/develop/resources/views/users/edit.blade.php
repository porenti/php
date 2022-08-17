@extends('layouts.maintemple')
@section('content')

    <form method="POST" action="{{  route('users.update', $user)  }}">
        @csrf

        @include('users.forms._form')
        <div class="text-center mb-3">
            @method("PUT")
            <button type="submit" href="{{ route('users.update', $user) }}" class="btn btn-secondary">Сохранить</button>
        </div>


    </form>
@endsection
