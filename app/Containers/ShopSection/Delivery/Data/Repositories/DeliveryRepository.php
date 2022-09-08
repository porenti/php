<?php

namespace App\Containers\ShopSection\Delivery\Data\Repositories;

use App\Models\Shop\Delivery;
use Illuminate\Support\Collection;

class DeliveryRepository
{
    private Delivery $delivery;
    public function __construct(?Delivery $delivery)
    {
        $this->delivery = $delivery ?? null;
    }
    public function getAllDeliveries(): Collection {
        return Delivery::all();//pluck('name','price');
    }
}