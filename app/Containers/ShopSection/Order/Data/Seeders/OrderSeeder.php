<?php

namespace App\Containers\ShopSection\Order\Data\Seeders;

use App\Models\Shop\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i<200000 ;$i++  )
        {
            $order = new Order();
            $order->setCartId(rand(1,2));
            $order->setUserId(rand(2,102));
            $order->setDeliveryId(rand(1,3));
            $order->setAddressId(rand(1,4));
            $order->setPaymentMethodId(rand(1,3));
            $order->setSubtotalAmount(rand(100,500));
            $order->setTotalSale(rand(100,500));
            $order->setTotalAmount(rand(100,500));
            $order->setDeliveryPrice(rand(0,100));
            $order->setFirstName(fake()->name());
            $order->setLastName(fake()->name());
            $order->setMiddleName(fake()->name());
            $order->setPhone((string) rand(80000000000,89999999999));
            $order->setEmail(fake()->safeEmail());
            $order->save();
            if (Order::count() % 2000 === 0)
            {
                echo PHP_EOL.'1';
            }
        }
    }
}