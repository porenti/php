<?php

namespace App\Models;

use App\Traits\Relations\Images\HasImages;
use App\Interfaces\Images\Imagable;
use App\Models\Images\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $description
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property float $priceWithDiscount
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
        'priceWithDiscount',
    ];
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
    public function getPrice(): float
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

    public function getPriceWithDiscount(): float
    {
        return $this->priceWithDiscount;
    }

    public function setPriceWithDiscount($priceWithDiscount)
    {
        $this->priceWithDiscount = $priceWithDiscount;
    }

    public function softDelete()
    {
        $this->destroy();
    }

    public function scopeFilterProduct(Builder $query, string $value): Builder
    {
        $query->where('name', 'like', '%'.$value.'%')
            ->orWhere('description', 'like', '%'.$value.'%');
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
}
