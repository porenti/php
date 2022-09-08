<?php

namespace App\Containers\ShopSection\Order\Actions;

use App\Models\Shop\Cart;
use App\Models\Shop\Order;

class CreateOrderAction
{
    public function run(Cart $cart)
    {
        $order = new Order();

        dd($cart,$order);
    }
}