<?php

namespace App\Listeners;

use App\Events\ImageUploaded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateImage
{

    /**
     * @param ImageUploaded $event
     */
    public function handle(ImageUploaded $event)
    {

        $imagable = $event->getImagable();
        $image = $event->getImage();
        $filename = $event->getFilename();
        $path = $event->getPath();


        $mime = $image->mime();
        $mime = explode('/', $mime)[1];

        $nameWithMime = $filename . '.' . $mime;

        $localPath = $path . '/' . $nameWithMime;


        $size = 0;
        if (\Storage::exists($localPath)) {
            $size = \Storage::size($localPath);
        }


        $localPath = 'storage/' . $localPath;
        $publicPath = config('app.url') . '/' . $localPath;

        $image = $imagable->images()->create([
            'alt' => $filename,
            'public_path' => $publicPath,
            'height' => $image->height(),
            'width' => $image->width(),
            'name' => $filename,
            'mime_type' => $image->mime(),
            'local_path' => $localPath,
            'size' => $size
        ]);
    }
}
