<?php

namespace App\Events;

use App\Interfaces\Events\EventShouldHaveCart;
use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;
use Illuminate\Queue\SerializesModels;

class CartItemQuantityChangedEvent implements EventShouldHaveCart
{
    use  SerializesModels;


    private CartItem $cartItem;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(CartItem $cartItem)
    {
        $this->cartItem = $cartItem;
    }


    /**
     * @return CartItem
     */
    public function getCartItem(): CartItem
    {
        return $this->cartItem;
    }

    public function getCart(): Cart
    {
        return $this->getCartItem()->getCart();
    }
}
