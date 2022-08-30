<?php

namespace App\Containers\ShopSection\PurchaseDetail\Actions;

use App\Models\Shop\PaymentMethod;
use App\Models\Shop\PurchaseDetail;

class GenerateCommonPurchaseDetailAction
{


    public function run(?int $userId): PurchaseDetail
    {

        return PurchaseDetail::create([
            'user_id' => $userId,
            'delivery_id' => null,
            'address_id' => null,
            'payment_method_id' => PaymentMethod::LIST_PICKUP,
        ]);

    }
}
