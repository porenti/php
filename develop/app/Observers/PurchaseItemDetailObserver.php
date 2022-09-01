<?php

namespace App\Observers;

use App\Containers\ShopSection\CartItem\Actions\GenerateNewCartItemAction;
use App\Models\Shop\PurchaseItemDetail;

class PurchaseItemDetailObserver
{
    public function creating(PurchaseItemDetail $purchaseItemDetail)
    {
        $purchaseItemDetailId = $purchaseItemDetail->getKey();
        //мы на это закроем глаза.........

        app(GenerateNewCartItemAction::class)->run(app()['cart']->getCart()->getKey(), $purchaseItemDetailId);
    }
}
