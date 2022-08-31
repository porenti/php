<?php

namespace App\Containers\ShopSection\Cart\Utilities;

use App\Containers\ShopSection\Cart\Interfaces\CartManager;
use App\Models\Shop\Cart;

class Manager implements CartManager
{
    private Cart $cart;

    public function __construct()
    {
        //метод инициализации класса
    }
    // создаем логику для метода интерфейса, он вернет сам себя
    public function setCart(Cart $cart): CartManager
    {
        $this->cart = $cart;
        return $this;
    }
}
