<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Shop;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Coupon
 *
 * @property int $id
 * @property string $name
 * @property int $value
 * @property int|null $user_id
 * @property int $coupon_value_type_id
 * @property int $coupon_type_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property CouponsType $coupons_type
 * @property CouponsValueType $coupons_value_type
 * @property User|null $user
 * @property Collection|Cart[] $carts
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Coupon extends Model
{

    protected $table = 'coupons';

    protected $casts = [
        'value' => 'int',
        'user_id' => 'int',
        'coupon_value_type_id' => 'int',
        'coupon_type_id' => 'int'
    ];

    protected $fillable = [
        'name',
        'value',
        'user_id',
        'coupon_value_type_id',
        'coupon_type_id'
    ];

    public function coupons_type()
    {
        return $this->belongsTo(CouponsType::class, 'coupon_type_id');
    }

    public function coupons_value_type()
    {
        return $this->belongsTo(CouponsValueType::class, 'coupon_value_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'coupons_carts')
            ->using(CouponsCart::class)
            ->withPivot('value');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'coupons_orders')
            ->withPivot('id', 'value');
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

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
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
     * @return int
     */
    public function getCouponValueTypeId(): int
    {
        return $this->coupon_value_type_id;
    }

    /**
     * @param int $coupon_value_type_id
     */
    public function setCouponValueTypeId(int $coupon_value_type_id): void
    {
        $this->coupon_value_type_id = $coupon_value_type_id;
    }

    /**
     * @return int
     */
    public function getCouponTypeId(): int
    {
        return $this->coupon_type_id;
    }

    /**
     * @param int $coupon_type_id
     */
    public function setCouponTypeId(int $coupon_type_id): void
    {
        $this->coupon_type_id = $coupon_type_id;
    }

    /**
     * @return CouponsType
     */
    public function getCouponsType(): CouponsType
    {
        return $this->coupons_type;
    }

    /**
     * @return CouponsValueType
     */
    public function getCouponsValueType(): CouponsValueType
    {
        return $this->coupons_value_type;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @return Cart[]|Collection
     */
    public function getCarts(): Collection|array
    {
        return $this->carts;
    }

    /**
     * @return Order[]|Collection
     */
    public function getOrders(): Collection|array
    {
        return $this->orders;
    }

    public function scopeFilterSearch(Builder $query, string $value): Builder
    {
        $query
            ->where('name', 'like', '%' . $value . '%');

        return $query;
    }

    public function scopeFilter(Builder $query, array $frd): Builder
    {
        foreach ($frd as $key => $value) {
            if ($value === null) {
                continue;
            }
            switch ($key) {
                case 'search':
                    {
                        $query->filterSearch($value);
                    }
                    break;
            }
        }
        return $query;
    }

}
