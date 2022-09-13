<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class CouponsOrder
 *
 * @property int $id
 * @property int $coupon_id
 * @property int $order_id
 * @property int $value
 * @property Coupon $coupon
 * @property Order $order
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsOrder whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponsOrder whereValue($value)
 * @mixin \Eloquent
 */
class CouponsOrder extends Pivot
{
	protected $table = 'coupons_orders';
	public $timestamps = false;

	protected $casts = [
		'coupon_id' => 'int',
		'order_id' => 'int',
		'value' => 'int'
	];

	protected $fillable = [
		'coupon_id',
		'order_id',
		'value'
	];

	public function coupon()
	{
		return $this->belongsTo(Coupon::class);
	}

	public function order()
	{
		return $this->belongsTo(Order::class);
	}



    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }


}
