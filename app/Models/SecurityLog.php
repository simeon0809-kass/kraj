<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SecurityLog extends Model
{
    public const UPDATED_AT = null;

    public const EVENTS = [
        'visit_created',
        'visit_cancelled',
        'contact_submitted',
        'login',
        'login_failed',
        'logout',
    ];

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Logs are an audit trail: they must never be modified or removed through the application.
     */
    protected static function booted(): void
    {
        static::updating(fn () => false);
        static::deleting(fn () => false);
    }
}
