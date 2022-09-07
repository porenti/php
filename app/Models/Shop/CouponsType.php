<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CouponsType
 *
 * @property int $id
 * @property string $name
 * @property string $count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Coupon[] $coupons
 * @package App\Models
 * @property-read int|null $coupons_count
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsType whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CouponsType extends Model
{
	protected $table = 'coupons_types';

	protected $fillable = [
		'name',
		'count'
	];

	public function coupons()
	{
		return $this->hasMany(Coupon::class, 'coupon_type_id');
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

    /**
     * @return string
     */
    public function getCount(): string
    {
        return $this->count;
    }

    /**
     * @param string $count
     */
    public function setCount(string $count): void
    {
        $this->count = $count;
    }


}
