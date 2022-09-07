<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CouponsValueType
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Coupon[] $coupons
 * @package App\Models
 * @property-read int|null $coupons_count
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsValueType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsValueType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsValueType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsValueType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsValueType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsValueType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsValueType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CouponsValueType extends Model
{
	protected $table = 'coupons_value_types';

	protected $fillable = [
		'name'
	];

	public function coupons()
	{
		return $this->hasMany(Coupon::class, 'coupon_value_type_id');
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
