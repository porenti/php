<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DeliveriesPaymentMethod
 *
 * @property int $delivery_id
 * @property int $payment_method_id
 * @property-read \App\Models\Shop\Delivery $delivery
 * @property-read \App\Models\Shop\PaymentMethod $payment_method
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveriesPaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveriesPaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveriesPaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveriesPaymentMethod whereDeliveryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveriesPaymentMethod wherePaymentMethodId($value)
 * @mixin \Eloquent
 */
class DeliveriesPaymentMethod extends Model
{
	protected $table = 'deliveries_payment_methods';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'delivery_id' => 'int',
		'payment_method_id' => 'int'
	];

	protected $fillable = [
		'delivery_id',
		'payment_method_id'
	];

	public function delivery()
	{
		return $this->belongsTo(Delivery::class);
	}

	public function payment_method()
	{
		return $this->belongsTo(PaymentMethod::class);
	}

    /**
     * @return int
     */
    public function getDeliveryId(): int
    {
        return $this->delivery_id;
    }

    /**
     * @param int $delivery_id
     */
    public function setDeliveryId(int $delivery_id): void
    {
        $this->delivery_id = $delivery_id;
    }

    /**
     * @return int
     */
    public function getPaymentMethodId(): int
    {
        return $this->payment_method_id;
    }

    /**
     * @param int $payment_method_id
     */
    public function setPaymentMethodId(int $payment_method_id): void
    {
        $this->payment_method_id = $payment_method_id;
    }

}
