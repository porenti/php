<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AddressCountry
 *
 * @property int $id
 * @property string $name
 * @property-read Collection|\App\Models\Shop\Address[] $addresses
 * @property-read int|null $addresses_count
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry whereName($value)
 * @mixin \Eloquent
 */
class AddressCountry extends Model
{
	protected $table = 'address_countries';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function addresses()
	{
		return $this->hasMany(Address::class, 'country_id');
	}
}
