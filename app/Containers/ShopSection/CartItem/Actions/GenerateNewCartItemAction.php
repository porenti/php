<?php

namespace App\Containers\ShopSection\CartItem\Actions;

use App\Events\CartItemAddedEvent;
use App\Models\Product;
use App\Models\Shop\CartItem;
use Illuminate\Database\Eloquent\Model;

class GenerateNewCartItemAction
{
    public function run(Product $product): CartItem
    {

        $cartItem = new CartItem();
        $cartItem->setProductId($product->getKey());
        $cartItem->setQuantity(1);
        $cartItem->setCategoryName($product->getCategory()->getName());
        $cartItem->setProductName($product->getName());
        $cartItem->setSale($product->getSale()); // скидка (-100 рублей)

        $cartItem->setSubtotalAmount($product->getPrice()); //цена без скидки
        //dd($product->getSale(), $product->getPriceWithDiscount(), $product->getPrice());
        //итоговая цена
        $cartItem->setAmount($product->getSale() === null ? $product->getPrice() : $product->getPrice() - $product->getSale());
        $cartItem->setCartId(app()['cart']->getCartId());
        $cartItem->save();

        event(new CartItemAddedEvent($cartItem));

        return $cartItem;


    }
}

