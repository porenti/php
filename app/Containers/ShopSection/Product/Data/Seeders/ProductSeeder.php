<?php

namespace App\Containers\ShopSection\Product\Data\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(){
        $products = Product::count();
        if ($products === 0)
        {
            Product::create([
                'name' => 'Кукуруза',
                'price' => 100,
                'description' => 'бурум пум пум',
                'category_id' => 1,
                'quantity' => 200,
                'price_with_discount' => 50
            ]);
            Product::create([
                'name' => 'Лада седан',
                'price' => 150,
                'description' => 'бип бип',
                'category_id' => 2,
                'quantity' => 7,
                'price_with_discount' => null
            ]);
            Product::create([
                'name' => 'Куваджа',
                'price' => 175,
                'description' => 'быдыщ',
                'category_id' => 3,
                'quantity' => 2,
                'price_with_discount' => 150
            ]);
        }
    }
}