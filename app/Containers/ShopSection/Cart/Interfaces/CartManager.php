<?php

namespace App\Containers\ShopSection\Cart\Interfaces;


use App\Models\Shop\Cart;

//объявляем интерфейс который деклалирует методы которые мы можем использовать в дальнейшем
interface CartManager
{

    public function setCart(Cart $cart): self;

    public function getCart(): ?Cart;

    public function getCartId(): int;

    public function getQuantity(): int;
}
