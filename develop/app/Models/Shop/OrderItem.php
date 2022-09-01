<?php

namespace App\Models\Shop;

use App\Interfaces\Shop\PurchaseItemDetailable;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Shop\OrderItem
 *
 * @property int $id
 * @property int $order_id
 * @property int $quantity
 * @property int $sale
 * @property int $subtotal_amount
 * @property int $amount
 * @property string $created_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Shop\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrderItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereSubtotalAmount($value)
 * @method static \Illuminate\Database\Query\Builder|OrderItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrderItem withoutTrashed()
 * @mixin \Eloquent
 * @property string $name
 * @property string $description
 * @property int|null $product_id
 * @property-read Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereProductId($value)
 */
class OrderItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'order_items';
    public $timestamps = false;

    protected $casts = [
        'order_id' => 'int',
        'quantity' => 'int',
        'sale' => 'int',
        'subtotal_amount' => 'int',
        'amount' => 'int'
    ];

    protected $fillable = [
        'order_id',
        'quantity',
        'sale',
        'subtotal_amount',
        'amount',
        'name',
        'description',
        'product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): ?Product
    {
        return $this->getProduct();
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @param int $order_id
     */
    public function setOrderId(int $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getSale(): int
    {
        return $this->sale;
    }

    /**
     * @param int $sale
     */
    public function setSale(int $sale): void
    {
        $this->sale = $sale;
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
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    /**
     * @param int|null $product_id
     */
    public function setProductId(?int $product_id): void
    {
        $this->product_id = $product_id;
    }



}
