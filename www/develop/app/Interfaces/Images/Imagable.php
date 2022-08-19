<?php

namespace App\Interfaces\Images;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;

interface Imagable
{


    public function getPathForImages(): string;

    public function images(): MorphMany;

    public function getImages(): Collection;

}
