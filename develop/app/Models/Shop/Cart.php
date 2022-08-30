<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Shop\Cart
 *
 * @property int $id
 * @property int $session_id
 * @property int $purchase_detail_id
 * @property string|null $canceled_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Shop\PurchaseDetail $purchaseDetail
 * @property-read \App\Models\Shop\Session $session
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCanceledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePurchaseDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSessionId($value)
 * @mixin \Eloquent
 */
class Cart extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    protected $fillable = [
        'session_id',
        'purchase_detail_id',
        'canceled_at',
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
