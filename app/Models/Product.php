<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'crafts_category_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
    ];

    protected function casts(): array
    {
        return [
            'category_id' => 'integer',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
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
