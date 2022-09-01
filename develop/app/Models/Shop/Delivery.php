<?php

namespace App\Models\Shop;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop\Delivery
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Cart[] $carts
 * @property-read int|null $carts_count
 * @property-read \App\Models\Shop\DeliveriesPaymentMethod|null $deliveries_payment_method
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Order[] $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery wherePrice($value)
 * @mixin \Eloquent
 */
class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Delivery
     */
    public function setName(string $name): Delivery
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return Delivery
     */
    public function setPrice(int $price): Delivery
    {
        $this->price = $price;
        return $this;
    }

}
