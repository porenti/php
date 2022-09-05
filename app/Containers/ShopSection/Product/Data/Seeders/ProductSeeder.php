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
                'price' => 10050,
                'description' => 'бурум пум пум',
                'category_id' => 1,
                'quantity' => 200,
                'priceWithDiscount' => 9999
            ]);
            Product::create([
                'name' => 'Лада седан',
                'price' => 1000050,
                'description' => 'бип бип',
                'category_id' => 2,
                'quantity' => 7,
                'priceWithDiscount' => 0
            ]);
            Product::create([
                'name' => 'Куваджа',
                'price' => 200050,
                'description' => 'быдыщ',
                'category_id' => 3,
                'quantity' => 2,
                'priceWithDiscount' => 175000
            ]);
        }
    }
}