<?php

namespace App\Events;

use App\Interfaces\Events\EventShouldHaveCart;
use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;
use Illuminate\Queue\SerializesModels;

class CartItemRemovedEvent implements EventShouldHaveCart
{
    use SerializesModels;

    private Cart $cart;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }


    public function getCart(): Cart
    {
        return $this->cart;
    }
}
