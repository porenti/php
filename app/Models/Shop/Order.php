<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Shop\Order
 *
 * @property int $id
 * @property int $cart_id
 * @property int|null $user_id
 * @property int|null $delivery_id
 * @property int|null $address_id
 * @property int $payment_method_id
 * @property int $subtotal_amount
 * @property int $total_amount
 * @property int $total_sale
 * @property int $delivery_price
 * @property string $created_at
 * @property-read \App\Models\Shop\Cart $cart
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubtotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $phone
 * @property string $email
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhone($value)
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    public $timestamps = false;

    protected $casts = [
        'cart_id' => 'int',
        'user_id' => 'int',
        'delivery_id' => 'int',
        'address_id' => 'int',
        'payment_method_id' => 'int',
        'subtotal_amount' => 'int',
        'total_amount' => 'int',
        'total_sale' => 'int',
        'delivery_price' => 'int'
    ];

    protected $fillable = [
        'cart_id',
        'user_id',
        'delivery_id',
        'address_id',
        'payment_method_id',
        'subtotal_amount',
        'total_amount',
        'total_sale',
        'delivery_price'
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     * @return int
     */
    public function getCartId(): int
    {
        return $this->cart_id;
    }

    /**
     * @param int $cart_id
     */
    public function setCartId(int $cart_id): void
    {
        $this->cart_id = $cart_id;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @param int|null $user_id
     */
    public function setUserId(?int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int|null
     */
    public function getDeliveryId(): ?int
    {
        return $this->delivery_id;
    }

    /**
     * @param int|null $delivery_id
     */
    public function setDeliveryId(?int $delivery_id): void
    {
        $this->delivery_id = $delivery_id;
    }

    /**
     * @return int|null
     */
    public function getAddressId(): ?int
    {
        return $this->address_id;
    }

    /**
     * @param int|null $address_id
     */
    public function setAddressId(?int $address_id): void
    {
        $this->address_id = $address_id;
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

    /**
     * @return int
     */
    public function getSubtotalAmount(): int
    {
        return $this->subtotal_amount;
    }

    /**
     * @param int $subtotal_amount
     */
    public function setSubtotalAmount(int $subtotal_amount): void
    {
        $this->subtotal_amount = $subtotal_amount;
    }

    /**
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    /**
     * @param int $total_amount
     */
    public function setTotalAmount(int $total_amount): void
    {
        $this->total_amount = $total_amount;
    }

    /**
     * @return int
     */
    public function getTotalSale(): int
    {
        return $this->total_sale;
    }

    /**
     * @param int $total_sale
     */
    public function setTotalSale(int $total_sale): void
    {
        $this->total_sale = $total_sale;
    }

    /**
     * @return int
     */
    public function getDeliveryPrice(): int
    {
        return $this->delivery_price;
    }

    /**
     * @param int $delivery_price
     */
    public function setDeliveryPrice(int $delivery_price): void
    {
        $this->delivery_price = $delivery_price;
    }



}
