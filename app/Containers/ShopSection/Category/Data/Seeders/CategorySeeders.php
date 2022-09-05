<?php

namespace App\Containers\ShopSection\Category\Data\Seeders;



use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeders extends Seeder
{
    public function run()
    {
        $categories = Category::count();
        if ($categories === 0) {
            Category::create([
                'name' => 'Продукты'
            ]);
            Category::create([
                'name' => 'Автомобили'
            ]);
            Category::create([
                'name' => 'Инструменты'
            ]);
        }
    }
}