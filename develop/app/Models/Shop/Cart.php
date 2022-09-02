<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Collection;

/**
 * App\Models\Shop\Cart
 *
 * @property int $id
 * @property int|null $session_id
 * @property int|null $user_id
 * @property int|null $delivery_id
 * @property int|null $address_id
 * @property int $payment_method_id
 * @property int $subtotal_amount
 * @property int $total_amount
 * @property int $total_sale
 * @property int $delivery_price
 * @property \Illuminate\Support\Carbon|null $canceled_at
 * @property string $created_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\CartItem[] $cartItems
 * @property-read int|null $cart_items_count
 * @property-read \App\Models\Shop\PurchaseDetail|null $purchaseDetail
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\PurchaseItemDetail[] $purchaseItemDetails
 * @property-read int|null $purchase_item_details_count
 * @property-read \App\Models\Shop\Session|null $session
 * @method static Builder|Cart filterNotCanceled()
 * @method static Builder|Cart newModelQuery()
 * @method static Builder|Cart newQuery()
 * @method static Builder|Cart query()
 * @method static Builder|Cart whereAddressId($value)
 * @method static Builder|Cart whereCanceledAt($value)
 * @method static Builder|Cart whereCreatedAt($value)
 * @method static Builder|Cart whereDeliveryId($value)
 * @method static Builder|Cart whereDeliveryPrice($value)
 * @method static Builder|Cart whereId($value)
 * @method static Builder|Cart wherePaymentMethodId($value)
 * @method static Builder|Cart whereSessionId($value)
 * @method static Builder|Cart whereSubtotalAmount($value)
 * @method static Builder|Cart whereTotalAmount($value)
 * @method static Builder|Cart whereTotalSale($value)
 * @method static Builder|Cart whereUserId($value)
 * @mixin \Eloquent
 */
class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    public $timestamps = false;

    protected $casts = [
        'session_id' => 'int',
        'user_id' => 'int',
        'delivery_id' => 'int',
        'address_id' => 'int',
        'payment_method_id' => 'int',
        'subtotal_amount' => 'int',
        'total_amount' => 'int',
        'total_sale' => 'int',
        'delivery_price' => 'int'
    ];

    protected $dates = [
        'canceled_at'
    ];

    protected $fillable = [
        'session_id',
        'user_id',
        'delivery_id',
        'address_id',
        'payment_method_id',
        'subtotal_amount',
        'total_amount',
        'total_sale',
        'delivery_price',
        'canceled_at'
    ];


    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeFilterNotCanceled(Builder $query): Builder
    {
        return $query->whereNull('canceled_at');
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    public function getSession(): Session
    {
        return $this->session;
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function getCartItems(): Collection
    {
        return $this->cartItems;
    }

    public function purchaseItemDetails(): HasManyThrough
    {
        return $this->hasManyThrough(PurchaseItemDetail::class, CartItem::class, 'purchase_item_detail_id', 'id', 'id',);
    }


    /**
     * @return int
     */
    public function getSessionId(): int
    {
        return $this->session_id;
    }

    /**
     * @param int $session_id
     */
    public function setSessionId(int $session_id): void
    {
        $this->session_id = $session_id;
    }


    /**
     * @return string|null
     */
    public function getCanceledAt(): ?string
    {
        return $this->canceled_at;
    }

    /**
     * @param string|null $canceled_at
     */
    public function setCanceledAt(?string $canceled_at): void
    {
        $this->canceled_at = $canceled_at;
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

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'coupons_carts')
            ->withPivot('id', 'value');
    }

    public function getCoupons(): ?Collection
    {
        return $this->coupons;
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
