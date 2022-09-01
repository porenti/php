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
        return $this->hasManyThrough(PurchaseItemDetail::class,CartItem::class,'purchase_item_detail_id','id','id',);
    }

    public function purchaseDetail(): BelongsTo
    {
        return $this->belongsTo(PurchaseDetail::class);
    }

    public function getPurchaseDetail(): PurchaseDetail
    {
        return $this->purchaseDetail;
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
     * @return int
     */
    public function getPurchaseDetailId(): int
    {
        return $this->purchase_detail_id;
    }

    /**
     * @param int $purchase_detail_id
     */
    public function setPurchaseDetailId(int $purchase_detail_id): void
    {
        $this->purchase_detail_id = $purchase_detail_id;
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

}
