<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GuardController extends Controller
{
    public function showLogin()
    {
        return view('front.guard.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->isSecurity() || Auth::user()->isAdmin()) {
                return redirect()->route('guard.kiosk');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Немате безбедносни привилегии.']);
            }
        }

        return back()->withErrors(['email' => 'Погрешен емаил или лозинка.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('guard.login');
    }

    public function index()
    {
        return view('front.guard.kiosk');
    }

    public function checkPin(Request $request)
    {
        $pin = $request->pin;
        $today = Carbon::today()->toDateString();

        $visit = Visit::where('visit_code', $pin)
            ->where('date', $today)
            ->first();

        if (!$visit) {
            return response()->json(['status' => 'error', 'message' => 'Неважечки код или посетата не е за денес.']);
        }

        if ($visit->status === 'attended') {
            return response()->json(['status' => 'error', 'message' => 'Овој код е веќе искористен денес!']);
        }

        return response()->json([
            'status' => 'success',
            'visit' => $visit
        ]);
    }

    public function markAttended(Request $request, $id)
    {
        $visit = Visit::findOrFail($id);
        $visit->update(['status' => 'attended']);

        return response()->json(['status' => 'success']);
    }
}