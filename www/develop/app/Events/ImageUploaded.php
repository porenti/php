<?php

namespace App\Events;

use App\Interfaces\Images\Imagable;

use Illuminate\Queue\SerializesModels;
use Intervention\Image\Image;

class ImageUploaded
{
    use SerializesModels;


    private Imagable $imagable;
    private Image $image;
    private string $path;
    private string $filename;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Imagable $imagable, Image $image, string $path, string $filename)
    {
        $this->imagable = $imagable;
        $this->image = $image;
        $this->path = $path;
        $this->filename = $filename;
    }


    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @return Imagable
     */
    public function getImagable(): Imagable
    {
        return $this->imagable;
    }

    /**
     * @return Image
     */
    public function getImage(): Image
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

}
