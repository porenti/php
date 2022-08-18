@extends('layouts.maintemple')
@section('content')

    <div class="container">
      @isset($frd)
      <div>
        <label> {{ $frd->display_name }} </label>
            <a class="btn btn-warning" href="{{route('roles.index')}}">Вернуться к списку всех ролей</a>
      </div>
      @endisset
      <table class="table" style="color: white">
        <thead>
        <tr>
            <th scope="col">Роль</th>
            <th scope="col">Права</th>
        </tr>
        </thead>
        <tbody>
          <tr> <!-- tr - строка, td - колонка -->
            <td>
              @empty($frd)
              <form method="GET" action="{{ route('roles-perm') }}">
                <select class="form-control selectize selectize-input" multiple name="roles[]">
                  @foreach($roles as $role)
                      <option value="{{ $role->getKey() }}">
                          {{ $role->display_name }}
                      </option>
                  @endforeach
                </select>
                <button type="submit" class="btn btn-secondary">Выбрать</button>
              </form>
              @endempty


              @isset($frd)
              <form method="POST" action="{{ route('roles.update', $frd) }}">
              @csrf

                @include('roles.forms.role_form')

                @method("PATCH")
                <button type="sumbit" action="{{ route('roles.update', $frd) }}" class="btn btn-light mt-3">Редактировать</button>
              </form>
              @endisset


            </td>
            <td>
              @isset($frd)
              <form method="Post" action="{{ route('roles-update-perm', $frd) }}">
                @csrf
                <select class="form-control selectize selectize-input" multiple name="roles[]">
                @foreach($all_perms as $perm)

                    <option {{ $frd->hasPermission($perm->name) ? 'selected' : null }} value="{{ $perm->getKey() }}">
                        {{ $perm->display_name }}
                    </option>
                @endforeach
                </select>
                <button type="submit" href="{{route('roles.index')}}" class="btn btn-secondary">Сохранить</button>
              </form>
              @endisset
              @empty($frd)
              Данные о правах группы
              @endempty
            </td>
          </tr>
          <tr>
            <td>
              @isset($frd)
                <form method="Post" action="{{ route('roles.destroy', $frd) }}">
                  @csrf
                  @method("DELETE")
                  <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
              @endisset
            </td>
            <td>
              @empty($frd)
              <form method="POST" action="{{ route('roles.store') }}">
              @csrf

                @include('roles.forms.role_form')


                <button type="submit" class="btn btn-secondary">Добавить</button>
              </form>
              @endempty
            </td>
          </tr>
        </tbody>
        </table>

    </div>

@endsection
