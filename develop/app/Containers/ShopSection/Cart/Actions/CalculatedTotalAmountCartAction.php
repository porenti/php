<?php
namespace App\Containers\ShopSection\Cart\Actions;

use App\Models\Shop\Cart;

class CalculatedTotalAmountCartAction
{
    public function run(Cart $cart): int
    {
        dd($cart->with('cartItems')->first());
        return 1;
    }
}
