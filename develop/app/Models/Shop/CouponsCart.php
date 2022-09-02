<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CouponsCart
 *
 * @property int $id
 * @property int $coupon_id
 * @property int $cart_id
 * @property int $value
 *
 * @property Cart $cart
 * @property Coupon $coupon
 *
 * @package App\Models
 */
class CouponsCart extends Model
{
	protected $table = 'coupons_carts';
	public $timestamps = false;

	protected $casts = [
		'coupon_id' => 'int',
		'cart_id' => 'int',
		'value' => 'int'
	];

	protected $fillable = [
		'coupon_id',
		'cart_id',
		'value'
	];

	public function cart()
	{
		return $this->belongsTo(Cart::class);
	}

	public function coupon()
	{
		return $this->belongsTo(Coupon::class);
	}
}
