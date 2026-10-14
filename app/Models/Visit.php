<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * These must match the column names in your visits migration.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'visit_code',
        'session_id',
        'date',
        'time',
        'prisoner_num',
        'visitors',
        'phone',
        'has_children',
        'children_names',
        'declared_items',
        'status',
    ];

    protected $casts = [
        'has_children' => 'boolean',
        'declared_items' => 'array',
    ];
}
