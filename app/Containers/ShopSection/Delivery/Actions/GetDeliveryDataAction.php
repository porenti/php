<?php

namespace App\Containers\ShopSection\Delivery\Actions;

use App\Containers\ShopSection\Delivery\Data\Repositories\DeliveryRepository;
use App\Models\Shop\Delivery;

class GetDeliveryDataAction
{
    public function run() {
        return app(DeliveryRepository::class)->getAllDeliveries();
    }
}