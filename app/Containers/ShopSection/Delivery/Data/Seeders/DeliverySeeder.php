<?php
namespace App\Containers\ShopSection\Delivery\Data\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop\Delivery;

class DeliverySeeder extends Seeder
{
    public function run()
    {
        $deliveres = Delivery::all();
        if ($deliveres->count() === 0) {
            Delivery::create([
                'name' => 'Самовывоз',
                'price' => 0,
            ]);
            Delivery::create([
                'name' => 'Почта России',
                'price' => 150,
            ]);
            Delivery::create([
                'name' => 'Сбер Доставка',
                'price' => 250,
            ]);
        }
    }

}