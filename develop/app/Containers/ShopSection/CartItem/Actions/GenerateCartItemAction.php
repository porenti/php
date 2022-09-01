<?php

namespace App\Containers\ShopSection\CartItem\Actions;

use App\Containers\ShopSection\PurchaseItemDetail\Task\CreatePurchaseItemDetailTask;
use App\Models\Product;
use App\Models\Shop\CartItem;
use Illuminate\Database\Eloquent\Model;

class GenerateCartItemAction
{
    public function run(Product $product): CartItem
    {
        $purchase = app(CreatePurchaseItemDetailTask::class)->run($product);


        $cartItem = new CartItem();
        $cartItem->setCartId(app()['cart']->getCart()->getKey());
        $cartItem->save();


        return $cartItem;


    }
}

