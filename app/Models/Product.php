<?php

namespace App\Models;

use App\Models\Shop\CartItem;
use App\Ship\Casts\Penny;
use App\Traits\Relations\Images\HasImages;
use App\Interfaces\Images\Imagable;
use App\Models\Images\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $description
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $priceWithDiscount
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|Image[] $images
 * @property-read int|null $images_count
 * @method static Builder|Product filter(array $frd)
 * @method static Builder|Product filterDeleted()
 * @method static Builder|Product filterProduct(string $value)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDeletedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product wherePriceWithDiscount($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|CartItem[] $cartItems
 * @property-read int|null $cart_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Image[] $image
 * @property-read int|null $image_count
 * @property int $quantity
 * @method static Builder|Product whereQuantity($value)
 * @property mixed|null $price_with_discount
 */
class Product extends Model implements Imagable
{
    use HasFactory;
    use SoftDeletes;
    use HasImages;

    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'deleted_at',
        'price_with_discount',
        'quantity',
    ];
    protected $casts = [
        'price' => Penny::class,
        'price_with_discount' => Penny::class
    ];

    public function cartItems(): HasMany
    {
        return $this->HasMany(CartItem::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price ;
    }

    public function getPriceFormatted(): string
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPriceWithDiscount(): ?int
    {
        return $this->price_with_discount;
    }

    public function setPriceWithDiscount($priceWithDiscount)
    {
        $this->price_with_discount = $priceWithDiscount;
    }

    public function softDelete()
    {
        $this->delete();
    }

    public function scopeFilterProduct(Builder $query, string $value): Builder
    {
        $query->where('name', 'like', '%' . $value . '%')
            ->orWhere('description', 'like', '%' . $value . '%');
        return $query;
    }

    public function scopeFilter(Builder $query, array $frd): Builder
    {
        foreach ($frd as $key => $value) {
            if (null === $value) {
                continue;
            }

            switch ($key) {
                case 'search':
                    {

                        $query->FilterProduct($value);
                    }
                    break;
                case 'category':
                {
                    $query->where('category_id', $value);
                }
            }

        }
        return $query;
    }

    public function scopeFilterDeleted(Builder $query): Builder
    {
        return $query->where('deleted_at', null);
    }

    public function getPathForImages(): string
    {
        return 'catalog' . '/images';
    }

    public function getSale(): ?int
    {
        $result = 0;
        if ($this->getPriceWithDiscount() !== null and $this->getPriceWithDiscount() !== 0) {
            $result = $this->getPrice() - $this->getPriceWithDiscount();
        }
        return $result;
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

}
