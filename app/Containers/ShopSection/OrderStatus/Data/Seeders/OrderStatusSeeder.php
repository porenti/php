<?php

namespace App\Containers\ShopSection\OrderStatus\Data\Seeders;
use App\Models\Shop\OrderStatus;
use Illuminate\Database\Seeder;


class OrderStatusSeeder extends Seeder
{
    public function run()
    {
        $orderStatuses = OrderStatus::count();
        if ($orderStatuses === 0)
        {
            OrderStatus::create([
                    'name' => 'В обработке',
                    'style' => 'rgb(106, 90, 205)']
            );
            OrderStatus::create([
                    'name' => 'В доставке',
                    'style' => 'rgb(0, 0, 255)
']
            );
            OrderStatus::create([
                    'name' => 'Доставлено',
                    'style' => 'rgb(60, 179, 113)
']
            );
            OrderStatus::create([
                    'name' => 'Ошибка',
                    'style' => 'rgb(255, 165, 0)
']
            );





        }

    }
}