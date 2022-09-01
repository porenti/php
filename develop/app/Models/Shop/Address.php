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
		'room'
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
}
