<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AddressCity
 *
 * @property int $id
 * @property string $name
 * @property-read Collection|\App\Models\Shop\Address[] $addresses
 * @property-read int|null $addresses_count
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity whereName($value)
 * @mixin \Eloquent
 */
class AddressCity extends Model
{
	protected $table = 'address_cities';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function addresses()
	{
		return $this->hasMany(Address::class, 'city_id');
	}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}
