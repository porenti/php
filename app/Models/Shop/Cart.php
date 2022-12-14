<?php

namespace App\Models\Shop;

use App\Models\User;
use App\Ship\Casts\Penny;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\CartItem[] $cartItemsWhereProductWithoutSale
 * @property-read int|null $cart_items_where_product_without_sale_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Coupon[] $coupons
 * @property-read int|null $coupons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Delivery[] $delivery
 * @property-read int|null $delivery_count
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $middle_name
 * @property string|null $phone
 * @property string|null $email
 * @method static Builder|Cart whereEmail($value)
 * @method static Builder|Cart whereFirstName($value)
 * @method static Builder|Cart whereLastName($value)
 * @method static Builder|Cart whereMiddleName($value)
 * @method static Builder|Cart wherePhone($value)
 * @property-read \App\Models\Shop\Address|null $addresses
 * @property-read User|null $users
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
        'subtotal_amount' => Penny::class,
        'total_amount' => Penny::class,
        'total_sale' => Penny::class,
        'delivery_price' => Penny ::class
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
        'subtotal_amount', //?????????????? ?????????? ?????? ????????????
        'total_amount', //?????????????? ?????????? ?????????????? (?? ???????????? ????????????)
        'total_sale',  //?????????????? ?????????????? ??????????????
        'delivery_price',
        'canceled_at',
        'first_name',
        'last_name',
        'middle_name',
        'phone',
        'email'
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

    public function getCartSum(): string|float|int
    {
        return $this->getTotalAmount() + $this->getDeliveryPrice() ?? 0;
    }

    public function getSession(): Session
    {
        return $this->session;
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function cartItemsWhereProductWithoutSale(): HasMany
    {
        return $this->cartItems()->filterProductWithoutSale();
    }

    public function getCartItemsWhereProductWithoutSale(): Collection
    {
        return $this->cartItemsWhereProductWithoutSale;
    }

    public function getCartItems(): Collection
    {
        return $this->cartItems;
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

    public function delivery(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }

    public function setDelivery(Delivery $delivery)
    {
        $this->delivery = $delivery;
    }

    public function getDelivery(): Delivery
    {
        return $this->delivery;
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
            ->using(CouponsCart::class)
            ->withPivot('value');
    }

    public function getCoupons(): Coupon|Collection|null
    {
        return $this->coupons;
    }

    public function setCoupons(Coupon $coupon)
    {
        $this->coupons = $coupon;
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

    public function getDecoratedTotalAmount(): float|string
    {
        return $this->total_amount;
    }

    public function getDecoratedSubTotalAmount(): float|string
    {
        return $this->subtotal_amount;
    }

    public function getDecoratedTotalSale(): float|string
    {
        return $this->total_sale;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string|null $first_name
     */
    public function setFirstName(?string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     */
    public function setLastName(?string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string|null
     */
    public function getMiddleName(): ?string
    {
        return $this->middle_name;
    }

    /**
     * @param string|null $middle_name
     */
    public function setMiddleName(?string $middle_name): void
    {
        $this->middle_name = $middle_name;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getUser(): ?User
    {
        return $this->users;
    }

    public function addresses(): BelongsTo
    {
        return $this->belongsTo(Address::class,'address_id');
    }

    public function getAddresses(): ?Address
    {
        return $this->addresses;
    }
}
