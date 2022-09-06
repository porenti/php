<?php


namespace App\Containers\ShopSection\CartItem\Data\Repositories;

use App\Models\Product;
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


    public function getProductQuantyById(int $cartItemId): int {
        //dd(CartItem::where('id',$cartItemId)->with('product')->first()->pluck('quantity')->first());
        return CartItem::where('id',$cartItemId)->with('product')->first()->getProduct()->getQuantity();
        //return CartItem::where('id',$cartItemId)->with('product')->first()->pluck('quantity')->first();
    }

    public function getListByCart(Cart $cart, array $columns = ['*'], array $with = []): Collection
    {
        return $cart->cartItems()->select($columns)->with($with)->get();
    }

}
