<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'job_title',
        'email',
        'image',
        'type_of_employee',
    ];

    public function scopeEmployees($query)
    {
        return $query->where('type_of_employee', 'EMPLOYEE');
    }

    public function scopeDirectors($query)
    {
        return $query->where('type_of_employee', 'DIRECTOR');
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
