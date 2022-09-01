<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AddressHouse
 *
 * @property int $id
 * @property string $name
 * @property-read Collection|\App\Models\Shop\Address[] $addresses
 * @property-read int|null $addresses_count
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse whereName($value)
 * @mixin \Eloquent
 */
class AddressHouse extends Model
{
	protected $table = 'address_houses';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function addresses()
	{
		return $this->hasMany(Address::class, 'house_id');
	}
}
