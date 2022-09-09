<?php

namespace App\Containers\ShopSection\Address\Actions;

use App\Models\Shop\Address;
use App\Models\Shop\AddressCity;
use App\Models\Shop\AddressCountry;
use App\Models\Shop\AddressHouse;
use App\Models\Shop\AddressRegion;
use App\Models\Shop\AddressStreet;
use App\Ship\DaData\DaData;

class SaveAddressAction
{
    public function run(string $fullAdress): int
    {
        $dadata = new DaData();
        $address = $dadata->standardizationExample($fullAdress)[0];
        $addressCountry = AddressCountry::query()
            ->firstOrCreate([
               'name' => $address['country']
            ]);
        $addressCity = AddressCity::query()
            ->firstOrCreate([
                'name' => $address['city']
            ]);
        $addressHouse = AddressHouse::query()
            ->firstOrCreate([
                'name' => $address['house']
            ]);
        $addressRegion = AddressRegion::query()
            ->firstOrCreate([
                'name' => $address['region_with_type']
            ]);
        $addressStreet = AddressStreet::query()
            ->firstOrCreate([
                'name' => $address['street']
            ]);
        $mainAdress = Address::query()
           ->firstOrCreate([
               'full_address' => $address['result']
           ],[
             'room' =>   $address['flat'] ?? null,
               'country_id' => $addressCountry->getKey(),
               'city_id' => $addressCity->getKey(),
               'house_id' => $addressHouse->getKey(),
               'region_id' => $addressRegion->getKey(),
               'street_id' => $addressStreet->getKey(),
           ]);
        return $mainAdress->getKey();
    }
}