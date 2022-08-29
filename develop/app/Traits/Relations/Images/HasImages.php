<?php

namespace App\Traits\Relations\Images;

use App\Events\ImageUploaded;
use App\Interfaces\Images\Imagable;
use App\Models\Images\Image;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Intervention\Image\ImageManager;

trait HasImages
{

    /**
     * @return MorphMany
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imagable');
    }

    public function getImages(): Collection
    {
        return $this->images;
    }

    public function putImage(UploadedFile $image, Imagable $imagable): Image
    {

        $imageManager = new ImageManager();

        $imageForProcessed = $imageManager->make($image);

        $pathForImage = $imagable->getPathForImages();

        $imageForProcessed->resize(100, 100);

        $filename = $image->getFilename();

        $processedImage = $imageForProcessed->encode('png', 90);


        $mime = $imageForProcessed->mime();
        $mime = explode('/', $mime)[1];

        \Storage::put($pathForImage . '/' . $filename . '.' . $mime, $processedImage);

        event(new ImageUploaded($imagable, $imageForProcessed, $pathForImage,$filename));


        $imagable->load('images');

        $image = $imagable->getImages()->last();

        return $image;

    }

}
