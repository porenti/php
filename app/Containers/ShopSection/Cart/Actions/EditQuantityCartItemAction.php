<?php


namespace App\Containers\ShopSection\Cart\Actions;


use App\Events\CartItemQuantityChangedEvent;
use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;

class EditQuantityCartItemAction
{
    public function run(int $cartItemKey, int $quantity): void
    {
        $cartItem = CartItem::where('id', $cartItemKey)->first();
        $cartItem->setQuantity($quantity);
        $cartItem->save();
        event(new CartItemQuantityChangedEvent($cartItem));
    }
}
