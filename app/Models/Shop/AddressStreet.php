<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AddressStreet
 *
 * @property int $id
 * @property string $name
 * @property-read Collection|\App\Models\Shop\Address[] $addresses
 * @property-read int|null $addresses_count
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet whereName($value)
 * @mixin \Eloquent
 */
class AddressStreet extends Model
{
	protected $table = 'address_streets';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function addresses()
	{
		return $this->hasMany(Address::class, 'street_id');
	}
}
