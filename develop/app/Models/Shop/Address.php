<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Shop\Address
 *
 * @property int $id
 * @property int $country_id
 * @property int $region_id
 * @property int $city_id
 * @property int $street_id
 * @property int $house_id
 * @property string $room
 * @property-read \App\Models\Shop\AddressCity|null $addressCity
 * @property-read \App\Models\Shop\AddressCountry|null $addressCountry
 * @property-read \App\Models\Shop\AddressHouse|null $addressHouse
 * @property-read \App\Models\Shop\AddressRegion|null $addressRegion
 * @property-read \App\Models\Shop\AddressStreet|null $addressStreet
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereHouseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreetId($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'region_id',
        'city_id',
        'street_id',
        'house_id',
        'room',
    ];

    public function addressCountry(): BelongsTo
    {
        return $this->belongsTo(AddressCountry::class);
    }
    public function getAddressCountry(): AddressCountry
    {
        return $this->addressCountry;
    }

    public function addressRegion(): BelongsTo
    {
        return $this->belongsTo(AddressRegion::class);
    }
    public function getAddressRegion(): AddressRegion
    {
        return $this->addressRegion;
    }

    public function addressCity(): BelongsTo
    {
        return $this->belongsTo(AddressCity::class);
    }
    public function getAddressCity(): AddressCity
    {
        return $this->addressCity;
    }

    public function addressHouse(): BelongsTo
    {
        return $this->belongsTo(AddressHouse::class);
    }
    public function getAddressHouse(): AddressHouse
    {
        return $this->addressHouse;
    }

    public function addressStreet(): BelongsTo
    {
        return $this->belongsTo(AddressStreet::class);
    }
    public function getAddressStreet(): AddressStreet
    {
        return $this->addressStreet;
    }
    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->country_id;
    }

    /**
     * @param int $country_id
     */
    public function setCountryId(int $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return int
     */
    public function getRegionId(): int
    {
        return $this->region_id;
    }

    /**
     * @param int $region_id
     */
    public function setRegionId(int $region_id): void
    {
        $this->region_id = $region_id;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->city_id;
    }

    /**
     * @param int $city_id
     */
    public function setCityId(int $city_id): void
    {
        $this->city_id = $city_id;
    }

    /**
     * @return int
     */
    public function getStreetId(): int
    {
        return $this->street_id;
    }

    /**
     * @param int $street_id
     */
    public function setStreetId(int $street_id): void
    {
        $this->street_id = $street_id;
    }

    /**
     * @return int
     */
    public function getHouseId(): int
    {
        return $this->house_id;
    }

    /**
     * @param int $house_id
     */
    public function setHouseId(int $house_id): void
    {
        $this->house_id = $house_id;
    }

    /**
     * @return string
     */
    public function getRoom(): string
    {
        return $this->room;
    }

    /**
     * @param string $room
     */
    public function setRoom(string $room): void
    {
        $this->room = $room;
    }

}
