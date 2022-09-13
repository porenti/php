<?php

namespace App\Containers\ShopSection\Delivery\Actions;

use App\Containers\ShopSection\Delivery\Data\Repositories\DeliveryRepository;
use App\Models\Shop\Delivery;
use Illuminate\Database\Eloquent\Collection;

class GetDeliveryDataAction
{
    public function run(): Collection {
        return app(DeliveryRepository::class)->getAllDeliveries();
    }
}