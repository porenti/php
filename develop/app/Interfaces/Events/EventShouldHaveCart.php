<?php


namespace App\Interfaces\Events;

use App\Models\Shop\Cart;

interface EventShouldHaveCart
{
    public function getCart(): Cart;
}
