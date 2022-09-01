<?php

namespace App\Containers\ShopSection\CartItem\Actions;

use App\Models\Shop\CartItem;

Class CalculatedCartItemAction
{
    public function run(CartItem $cartItem): int
    {
        $price = $cartItem->getSubtotalAmount()-$cartItem->getSale();
        $sum = $price*$cartItem->getQuantity();
        $cartItem->setAmount($sum);
        return $sum;

    }
}
