<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #808080">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Тц</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
{{--                <li class="nav-item">--}}
                    <a class="nav-link active" aria-current="page" href="{{ route('main') }}">Главная</a>
                </li>
                @if(auth()->check() ?? auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.create')}}">Создать</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('roles.index')}}">Роли</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}">Товары</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('coupons.index')}}">Промокоды</a>
                    </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.index')}}">Категории</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
