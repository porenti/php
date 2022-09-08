<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AddressRegion
 *
 * @property int $id
 * @property string $name
 * @property-read Collection|\App\Models\Shop\Address[] $addresses
 * @property-read int|null $addresses_count
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion whereName($value)
 * @mixin \Eloquent
 */
class AddressRegion extends Model
{
	protected $table = 'address_regions';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function addresses()
	{
		return $this->hasMany(Address::class, 'region_id');
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
