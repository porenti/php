<?php

namespace App\Observers;

use App\Containers\ShopSection\CartItem\Actions\GenerateCartItemAction;
use App\Models\Shop\PurchaseItemDetail;

class PurchaseItemDetailObserver
{
    public function creating(PurchaseItemDetail $purchaseItemDetail)
    {
        $purchaseItemDetailId = $purchaseItemDetail->getKey();
        //мы на это закроем глаза.........

        app(GenerateCartItemAction::class)->run(app()['cart']->getCart()->getKey(), $purchaseItemDetailId);
    }
}
