<?php

namespace App\Models\Shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

/**
 * App\Models\Shop\Session
 *
 * @property int $id
 * @property string $name
 * @property int|null $user_id
 * @property string|null $expired_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Cart[] $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Cart[] $notCanceledCarts
 * @property-read int|null $not_canceled_carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Cart[] $notCanceledLastCart
 * @property-read int|null $not_canceled_last_cart_count
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserId($value)
 * @mixin \Eloquent
 */
class Session extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'user_id',
        'expired_at',
    ];


    public function notCanceledCarts(): HasMany
    {
        return $this->carts()->filterNotCanceled(); //обращаемся к фильтру из модели Cart
    }

    /**
     * @return HasMany
     */
    public function notCanceledLastCart(): HasMany
    {
        return $this->notCanceledCarts()->latest('id')->take(1);
    }

    /**
     * @return Cart|null
     */
    public function getNotCanceledLastCart(): ?Cart
    {
        return $this->notCanceledLastCart->first();
    }

    /**
     * @return HasMany
     */
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class); //связь обратная BelongsTo
    }

    /**
     * @return Collection
     */
    public function getCarts(): Collection
    {
        return $this->carts;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): ?User
    {
        return $this->user;
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
     * @return int|null
     */
    public function getUserId(): ?int
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
     * @return string|null
     */
    public function getExpiredAt(): ?string
    {
        return $this->expired_at;
    }

    /**
     * @param string|null $expired_at
     */
    public function setExpiredAt(?string $expired_at): void
    {
        $this->expired_at = $expired_at;
    }

}
