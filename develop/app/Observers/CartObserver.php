<?php

namespace App\Observers;

use App\Containers\ShopSection\PurchaseDetail\Actions\GenerateCommonPurchaseDetailAction;
use App\Models\Shop\Cart;

class CartObserver
{


    public function creating(Cart $cart)
    {
        $purchaseDetail = app(GenerateCommonPurchaseDetailAction::class)
            ->run($cart->getSession()->getUserId());
        $cart->setPurchaseDetailId($purchaseDetail->getKey());
    }

}
