<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'num_of_clicks',
    ];

    protected function casts(): array
    {
        return [
            'num_of_clicks' => 'integer',
        ];
    }

    public function scopeMostRead($query)
    {
        return $query->orderBy('num_of_clicks', 'desc');
    }

    public function scopeNewest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function imageUrl(): Attribute
    {
        return Attribute::get(function () {

            if (!$this->image) {
                return null;
            }

            $baseUrl = config('filesystems.disks.imagekit.endpoint_url') ?? env('IMAGEKIT_ENDPOINT_URL');

            return rtrim($baseUrl, '/') . '/' . ltrim($this->image, '/');
        });
    }
}
