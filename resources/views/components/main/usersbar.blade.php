<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #808080">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Тц</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <a class="nav-link " aria-current="page" href="{{ route('catalog.index') }}">Каталог</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cart" href="{{route('shop.cart.index')}}">Корзина X{{ app()['cart']->getQuantity() }}</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>
