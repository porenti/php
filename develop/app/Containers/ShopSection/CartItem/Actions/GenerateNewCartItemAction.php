<?php

namespace App\Containers\ShopSection\CartItem\Actions;

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
        //итоговая цена
        $cartItem->setAmount($product->getSale()!==0 ? $product->getPriceWithDiscount() : $product->getPrice());
        $cartItem->setCartId(app()['cart']->getCartId());
        $cartItem->save();


        return $cartItem;


    }
}

