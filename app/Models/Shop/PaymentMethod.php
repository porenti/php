<?php

namespace App\Models\Shop;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop\PaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Cart[] $carts
 * @property-read int|null $carts_count
 * @property-read \App\Models\Shop\DeliveriesPaymentMethod|null $deliveries_payment_method
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Delivery[] $delivery
 * @property-read int|null $delivery_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Order[] $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereName($value)
 * @mixin \Eloquent
 */
class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_methods';
    public $timestamps = false;

    public const LIST_PICKUP = 1;
    public const LIST_CASH = 2;
    public const LIST_CARD_PAYMENT = 3;
    public const LIST_ONLINE = 4;

    protected $fillable = [
        'name',
    ];

    public function delivery(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(Delivery::class, 'deliveries_payment_methods');
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
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function deliveries_payment_method()
    {
        return $this->hasOne(DeliveriesPaymentMethod::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
