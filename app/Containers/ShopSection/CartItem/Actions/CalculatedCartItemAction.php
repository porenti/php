<?php

namespace App\Containers\ShopSection\CartItem\Actions;

use App\Models\Shop\CartItem;

Class CalculatedCartItemAction
{
    public function run(CartItem $cartItem): int
    {
        $quantity = $cartItem->getQuantity();
        $price = $cartItem->getSubtotalAmount()-$cartItem->getSale();
        $sum = $price*$quantity;
        $cartItem->setAmount($sum);
        $cartItem->save();
        return $sum;

    }
}
