<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Renderable
     */
    public function __invoke(Request $request)
    {
        $employees = Employee::employees()->get();
        $directors = Employee::directors()->get();

        return view('front.about.index', compact('employees', 'directors'));
    }
}
