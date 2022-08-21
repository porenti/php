<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

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
