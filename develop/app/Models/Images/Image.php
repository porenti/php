<?php

namespace App\Models\Images;

use App\Interfaces\Images\Imagable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Images\Image
 *
 * @property int $id
 * @property string $imagable_type
 * @property int $imagable_id
 * @property string $local_path
 * @property string $public_path
 * @property string $name
 * @property string $mime_type
 * @property string $alt
 * @property int $size
 * @property int $width
 * @property int $height
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $imagable
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImagableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImagableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereLocalPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePublicPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereWidth($value)
 * @mixin \Eloquent
 */
class Image extends Model
{

    protected $fillable = [

        'imagable_id',
        'imagable_type',
        'local_path',
        'public_path',
        'size',
        'mime_type',
        'name',
        'alt',
        'width',
        'height',
    ];

    /**
     * @return MorphTo
     */
    public function imagable(): MorphTo
    {
        return $this->morphTo('imagable');
    }


    public function getImagable(): Imagable
    {
        return $this->imagable;
    }

    /**
     * @return string
     */
    public function getImagableType(): string
    {
        return $this->imagable_type;
    }

    /**
     * @param string $imagable_type
     */
    public function setImagableType(string $imagable_type): void
    {
        $this->imagable_type = $imagable_type;
    }

    /**
     * @return int
     */
    public function getImagableId(): int
    {
        return $this->imagable_id;
    }

    /**
     * @param int $imagable_id
     */
    public function setImagableId(int $imagable_id): void
    {
        $this->imagable_id = $imagable_id;
    }

    /**
     * @return string
     */
    public function getPublicPath(): string
    {
        return $this->public_path;
    }

    /**
     * @param string $public_path
     */
    public function setPublicPath(string $public_path): void
    {
        $this->public_path = $public_path;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mime_type;
    }

    /**
     * @param string $mime_type
     */
    public function setMimeType(string $mime_type): void
    {
        $this->mime_type = $mime_type;
    }

    /**
     * @return string
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     */
    public function setAlt(string $alt): void
    {
        $this->alt = $alt;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }


}
