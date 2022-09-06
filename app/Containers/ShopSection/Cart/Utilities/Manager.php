<?php

namespace App\Containers\ShopSection\Cart\Utilities;

use App\Containers\ShopSection\Cart\Interfaces\CartManager;
use App\Models\Product;
use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;
use Illuminate\Database\Eloquent\Builder;

class Manager implements CartManager
{
    private Cart $cart;

    public function __construct()
    {
        //метод инициализации класса
    }

    // создаем логику для метода интерфейса, он вернет сам себя
    public function setCart(Cart $cart): CartManager
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function checkInCart(int $productId): bool
    { //если есть - тру, нету - фолс
        $cart = $this->getCart();

//        $cart->loadCount('cartItems.purchaseItemDetail', function (Builder $query) use ($productId) {
//            return $query->where('product_id', $productId);
//        });
        $result = $cart
                ->whereHas('cartItems', function (Builder $query) use ($productId) {
                    return $query->where('product_id', $productId);
                })
                ->count() > 0;

        return $result;
    }

    public function getCartId(): int
    {
        return $this->getCart()->getKey();
    }

    public function getQuantity(): int
    {
        return $this->getCart()->cartItems()->sum('quantity');
    }
}
