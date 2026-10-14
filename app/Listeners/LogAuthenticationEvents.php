<?php

namespace App\Listeners;

use App\Services\SecurityLogger;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Events\Dispatcher;

class LogAuthenticationEvents
{
    public function handleLogin(Login $event): void
    {
        SecurityLogger::log('login', reference: $event->user->email, userId: $event->user->getAuthIdentifier());
    }

    public function handleFailed(Failed $event): void
    {
        SecurityLogger::log('login_failed', reference: $event->credentials['email'] ?? null);
    }

    public function handleLogout(Logout $event): void
    {
        if ($event->user) {
            SecurityLogger::log('logout', reference: $event->user->email, userId: $event->user->getAuthIdentifier());
        }
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            Login::class => 'handleLogin',
            Failed::class => 'handleFailed',
            Logout::class => 'handleLogout',
        ];
    }
}
