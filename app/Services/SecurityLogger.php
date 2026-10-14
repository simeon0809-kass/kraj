<?php

namespace App\Services;

use App\Models\SecurityLog;
use App\Support\UserAgentParser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class SecurityLogger
{
    /**
     * Record a security event. Never throws: a logging failure must not break the user's request.
     */
    public static function log(
        string $event,
        ?Request $request = null,
        ?string $subjectType = null,
        ?int $subjectId = null,
        ?string $reference = null,
        ?int $userId = null,
    ): ?SecurityLog {
        try {
            $request ??= request();
            $userAgent = $request->userAgent();

            return SecurityLog::create([
                'event' => $event,
                'subject_type' => $subjectType,
                'subject_id' => $subjectId,
                'reference' => $reference,
                'ip_address' => $request->ip(),
                'forwarded_for' => $request->headers->get('X-Forwarded-For'),
                'user_agent' => $userAgent ? mb_substr($userAgent, 0, 1000) : null,
                ...UserAgentParser::parse($userAgent),
                'accept_language' => mb_substr((string) $request->header('Accept-Language'), 0, 255) ?: null,
                'locale' => app()->getLocale(),
                'referer' => $request->headers->get('referer') ? mb_substr($request->headers->get('referer'), 0, 1000) : null,
                'url' => mb_substr($request->fullUrl(), 0, 2000),
                'method' => $request->method(),
                'session_id' => $request->hasSession() ? $request->session()->getId() : null,
                'user_id' => $userId ?? $request->user()?->id,
            ]);
        } catch (Throwable $e) {
            Log::error('Security log failed: '.$e->getMessage());

            return null;
        }
    }
}
