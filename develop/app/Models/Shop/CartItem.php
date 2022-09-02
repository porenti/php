<?php

namespace App\Models\Shop;


use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Shop\CartItem
 *
 * @property int $id
 * @property int $cart_id
 * @property int $product_id
 * @property int $quantity
 * @property int $sale
 * @property int $subtotal_amount
 * @property int $amount
 * @property string $created_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Shop\Cart $cart
 * @property-read Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|CartItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereSubtotalAmount($value)
 * @method static \Illuminate\Database\Query\Builder|CartItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CartItem withoutTrashed()
 * @mixin \Eloquent
 * @property float $category_name
 * @property float $product_name
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereProductName($value)
 */
class CartItem extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'cart_items';
    public $timestamps = false;

    protected $casts = [
        'cart_id' => 'int',
        'product_id' => 'int',
        'quantity' => 'int',
        'sale' => 'int',
        'subtotal_amount' => 'int',
        'amount' => 'int'
    ];

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'sale',
        'subtotal_amount',
        'amount',
        'category_name',
        'product_name'
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getProduct(){
        return $this->product;
    }

    /**
     * @return int
     */
    public function getCartId(): int
    {
        return $this->cart_id;
    }

    /**
     * @return float
     */
    public function getCategoryName(): string
    {
        return $this->category_name;
    }

    /**
     * @param float $category_name
     */
    public function setCategoryName(string $category_name): void
    {
        $this->category_name = $category_name;
    }

    /**
     * @return float
     */
    public function getProductName(): string
    {
        return $this->product_name;
    }

    /**
     * @param float $product_name
     */
    public function setProductName(string $product_name): void
    {
        $this->product_name = $product_name;
    }



    /**
     * @param int $cart_id
     */
    public function setCartId(int $cart_id): void
    {
        $this->cart_id = $cart_id;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @param int $product_id
     */
    public function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }


    public function checkQuantityInStorage(): int {
        return $this->getQuantity() < $this->getProduct()->getQuantity() ? $this->getQuantity()+1 : $this->getQuantity();

    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getTotalAmount(): int {
        return $this->quantity * $this->amount;
    }

    /**
     * @return int
     */
    public function getSale(): ?int
    {
        if ($this->sale !== 0) {
            return $this->sale;
        } else {
            return null;
        }
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


}
