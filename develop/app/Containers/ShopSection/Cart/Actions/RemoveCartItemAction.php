<?php


namespace App\Containers\ShopSection\Cart\Actions;


use App\Events\CartItemRemovedEvent;
use App\Models\Shop\Cart;

class RemoveCartItemAction
{
 public function run(int $productKey, Cart $cart){
     $cartItem = $cart
         ->cartItems()
         ->where('id', $productKey)
         ->first();


     $cartItem->delete();

     event(new CartItemRemovedEvent($cart));
 }
}
