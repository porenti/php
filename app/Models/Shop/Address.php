<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 *
 * @property int $id
 * @property int $country_id
 * @property int $region_id
 * @property int $city_id
 * @property int $street_id
 * @property int $house_id
 * @property string|null $room
 * @property-read \App\Models\Shop\AddressCity $address_city
 * @property-read \App\Models\Shop\AddressCountry $address_country
 * @property-read \App\Models\Shop\AddressHouse $address_house
 * @property-read \App\Models\Shop\AddressRegion $address_region
 * @property-read \App\Models\Shop\AddressStreet $address_street
 * @property-read Collection|\App\Models\Shop\Cart[] $carts
 * @property-read int|null $carts_count
 * @property-read Collection|\App\Models\Shop\Order[] $orders
 * @property-read int|null $orders_count
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
 * @property string|null $full_address
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFullAddress($value)
 */
class Address extends Model
{
	protected $table = 'addresses';
	public $timestamps = false;

	protected $casts = [
		'country_id' => 'int',
		'region_id' => 'int',
		'city_id' => 'int',
		'street_id' => 'int',
		'house_id' => 'int'
	];

	protected $fillable = [
		'country_id',
		'region_id',
		'city_id',
		'street_id',
		'house_id',
		'room',
        'full_address'
	];

	public function address_city()
	{
		return $this->belongsTo(AddressCity::class, 'city_id');
	}

	public function address_country()
	{
		return $this->belongsTo(AddressCountry::class, 'country_id');
	}

	public function address_house()
	{
		return $this->belongsTo(AddressHouse::class, 'house_id');
	}

	public function address_region()
	{
		return $this->belongsTo(AddressRegion::class, 'region_id');
	}

	public function address_street()
	{
		return $this->belongsTo(AddressStreet::class, 'street_id');
	}

	public function carts()
	{
		return $this->hasMany(Cart::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
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
     * @return string|null
     */
    public function getRoom(): ?string
    {
        return $this->room;
    }

    /**
     * @param string|null $room
     */
    public function setRoom(?string $room): void
    {
        $this->room = $room;
    }

    /**
     * @return string|null
     */
    public function getFullAddress(): ?string
    {
        return $this->full_address;
    }

    /**
     * @param string|null $full_address
     */
    public function setFullAddress(?string $full_address): void
    {
        $this->full_address = $full_address;
    }




}
