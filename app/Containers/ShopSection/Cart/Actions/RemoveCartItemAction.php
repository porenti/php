<?php


namespace App\Containers\ShopSection\Cart\Actions;


use App\Events\CartItemRemovedEvent;
use App\Models\Shop\Cart;

class RemoveCartItemAction
{
    public function run(int $cartItemId, Cart $cart)
    {
        $cartItem = $cart
            ->cartItems()
            ->where('id', $cartItemId)
            ->first();


        $cartItem->delete();

        event(new CartItemRemovedEvent($cart));
    }
}
