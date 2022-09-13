<?php

namespace Database\Seeders;

use App\Containers\ShopSection\Category\Data\Seeders\CategorySeeders;
use App\Containers\ShopSection\Order\Data\Seeders\OrderSeeder;
use App\Containers\ShopSection\OrderStatus\Data\Seeders\OrderStatusSeeder;
use App\Containers\ShopSection\PaymentMethod\Data\Seeders\PaymentMethodSeeder;
use App\Containers\ShopSection\Delivery\Data\Seeders\DeliverySeeder;

use App\Containers\ShopSection\Product\Data\Seeders\ProductSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CouponSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(LaratrustSeeder::class); //заполнить роли
        $this->call(AdminSeeder::class);
        \App\Models\User::factory(100)->create(); //заполнить пользователей
        $this->call(PaymentMethodSeeder::class);
        $this->call(CategorySeeders::class);
        $this->call(ProductSeeder::class);
        $this->call(DeliverySeeder::class);
        $this->call(OrderStatusSeeder::class);

        //$this->call(OrderSeeder::class);
    }
}
