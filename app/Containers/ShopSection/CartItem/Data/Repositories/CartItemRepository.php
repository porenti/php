<?php


namespace App\Containers\ShopSection\CartItem\Data\Repositories;

use App\Models\Shop\Cart;
use App\Models\Shop\CartItem;
use Illuminate\Support\Collection;


class CartItemRepository
{


    private CartItem $cartItems;

    public function __construct(CartItem $cartItems)
    {
        $this->cartItems = $cartItems;
    }


    public function getProductQuantyById(int $cartItemId): Collection {
        return CartItem::select('product_id')->where('id',$cartItemId)->get();
    }

    public function getListByCart(Cart $cart, array $columns = ['*'], array $with = []): Collection
    {
        return $cart->cartItems()->select($columns)->with($with)->get();
    }

}
