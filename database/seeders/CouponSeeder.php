<?php

namespace Database\Seeders;

use App\Models\Shop\Coupon;
use App\Models\Shop\CouponsType;
use App\Models\Shop\CouponsValueType;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couponTypes = CouponsType::all();
        if ($couponTypes->count() === 0)
        {
            CouponsType::create([
                'name' => 'Тип купона 1',
                'count' => random_int(1,10)
            ]);
            CouponsType::create([
                'name' => 'Тип купона 2',
                'count' => random_int(1,10)
            ]);
        }
        $couponValueTypes = CouponsValueType::all();
        if ($couponValueTypes->count() === 0)
        {
            CouponsValueType::create([
                'name' => 'Абсолютное'
            ]);
            CouponsValueType::create([
                'name' => 'Относительное'
            ]);
        }
        Coupon::create([
            'name' => 'Купон'.random_int(1,1000),
            'value' => random_int(1,50),
            'coupon_type_id' => 1,
            'coupon_value_type_id' => 1
        ]);
        Coupon::create([
            'name' => 'Купон'.random_int(1,1000),
            'value' => random_int(1,50),
            'coupon_type_id' => 2,
            'coupon_value_type_id' => 2
        ]);
    }
}
