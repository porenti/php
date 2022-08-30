<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Shop\PurchaseDetail
 *
 * @property int $id
 * @property int $user_id
 * @property int $delivery_id
 * @property int $address_id
 * @property int $payment_method_id
 * @property int $subtotal_amount
 * @property int $total_amount
 * @property int $total_sale
 * @property int $delivery_price
 * @property-read \App\Models\Shop\Address $address
 * @property-read \App\Models\Shop\Delivery $delivery
 * @property-read \App\Models\Shop\PaymentMethod $paymentMethod
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereDeliveryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereDeliveryPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereSubtotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereTotalSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereUserId($value)
 * @mixin \Eloquent
 */
class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_id',
        'address_id',
        'payment_method_id',
        'subtotal_amount',
        'total_amount',
        'total_sale',
        'delivery_price',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function getUser(): User
    {
        return $this->user;
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
    public function getAddress(): Address
    {
        return $this->address;
    }

    public function delivery(): BelongsTo
    {
        return $this->belongsTo(Delivery::class);
    }
    public function getDelivery(): Delivery
    {
        return $this->delivery;
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    public function getPaymentMethod(): PaymentMethod
    {
        return $this->paymentMethod;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
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
    public function getAddressId(): int
    {
        return $this->address_id;
    }

    /**
     * @param int $address_id
     */
    public function setAddressId(int $address_id): void
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
