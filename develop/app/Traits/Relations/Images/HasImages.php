<?php

namespace App\Traits\Relations\Images;

use App\Events\ImageUploaded;
use App\Interfaces\Images\Imagable;
use App\Models\Images\Image;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
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

    public function image(): MorphMany
    {
        return $this->images()->latest('id')->take(1);
    }

    public function getImage(): ?Image
    {
        return $this->image->first();
    }

    public function getImagePublicPath(): string
    {
        return $this->getImage()?->getPublicPath() ?? '/images/products/avatar.webp';
    }

    public function getImageWidth(): int
    {
        return $this->getImage()?->getWidth() ?? 100;
    }

    public function getImageAlt(): string
    {
        return $this->getImage()?->getAlt()
            ?? $this->getName();
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

        event(new ImageUploaded($imagable, $imageForProcessed, $pathForImage, $filename));


        $imagable->load('images');

        $image = $imagable->getImages()->last();

        return $image;

    }

}
