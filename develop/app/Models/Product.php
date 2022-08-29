<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

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
}
