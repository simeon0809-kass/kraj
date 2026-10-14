<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'image',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function getUrlAttribute()
    {
        if (! $this->image) {
            return null;
        }

        if (preg_match('/^https?:\/\//', $this->image)) {
            return $this->image;
        }

        $baseUrl = config('filesystems.disks.imagekit.endpoint_url') ?? env('IMAGEKIT_ENDPOINT_URL');

        return rtrim($baseUrl, '/').'/'.ltrim($this->image, '/');
    }
}
