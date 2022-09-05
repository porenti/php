<?php

namespace App\Containers\ShopSection\PaymentMethod\Data\Seeders;

use \App\Models\Shop\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {

        $paymentMethods = PaymentMethod::count();
        if ($paymentMethods === 0)
            {
                PaymentMethod::create([
                    'name' => 'Картой'
                ]);
                PaymentMethod::create([
                    'name' => 'Наличными'
                ]);
                PaymentMethod::create([
                    'name' => 'Онлайн'
                ]);
            }
    }
}