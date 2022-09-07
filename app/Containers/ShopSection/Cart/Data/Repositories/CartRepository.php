<?php

namespace App\Containers\ShopSection\Cart\Data\Repositories;

use App\Models\Shop\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class CartRepository
{

    private Cart $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function getCartBySessionName(string $previousSession): ?Cart
    {
        return $cartUnAuth = Cart::query() //репозиторий
        ->whereHas('session', function (Builder $query) use ($previousSession) {
            $query->where('name', 'like', $previousSession); //вынести в фильтр
        })

            ->withCount('cartItems')
            ->first();
    }

    public function getCartByUser(User $user): Cart|int
    {
        return $user
            ->carts() //репозиторий
            ->withCount('cartItems')
            ->filterNotCanceled()
            ->first() ?? 0;
    }
}