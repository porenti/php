<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category filter(array $frd)
 * @method static \Illuminate\Database\Eloquent\Builder|Category filterDeleted()
 * @method static \Illuminate\Database\Eloquent\Builder|Category filterSearch(string $value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'deleted_at',
    ];

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function softDelete()
    {
        //на сколько я понял мы просто добавляем время удаления и
        //не выводим записи где время удаления не равно null
        $this->deleted_at = now();
        $this->save();
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
            if (null === $value) {
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
    public function scopeFilterDeleted(Builder $query): Builder
    {
        return $query->where('deleted_at', null);
    }
}
