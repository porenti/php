<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CouponsOrder
 *
 * @property int $id
 * @property int $coupon_id
 * @property int $order_id
 * @property int $value
 *
 * @property Coupon $coupon
 * @property Order $order
 *
 * @package App\Models
 */
class CouponsOrder extends Model
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
}
