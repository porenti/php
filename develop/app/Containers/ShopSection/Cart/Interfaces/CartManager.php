<?php

namespace App\Containers\ShopSection\Cart\Interfaces;


use App\Models\Shop\Cart;

interface CartManager
{

    public function setCart(Cart $cart): self;
}
