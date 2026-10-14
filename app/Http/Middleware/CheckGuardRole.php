<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckGuardRole
{
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return redirect()->route('guard.login')->with('error', 'Мора да се најавите. (You must log in.)');
        }

        if (Auth::user()->isSecurity() || Auth::user()->isAdmin()) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Немате пристап до овој панел. (Unauthorized access.)');
    }
}