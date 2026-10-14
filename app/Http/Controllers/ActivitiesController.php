<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Renderable
     */
    public function __invoke(Request $request)
    {
        $mostReadActivities = Activities::mostRead()->limit(5)->get();
        $otherActivities = Activities::mostRead()->skip(5)->take(PHP_INT_MAX)->get();
        $newestActivity = Activities::newest()->limit(1)->get();

        return view('front.activities.index', compact('mostReadActivities', 'otherActivities', 'newestActivity'));
    }

    public function showActivity(int $id)
    {
        $activity = Activities::findOrFail($id);
        $activity->increment('num_of_clicks');

        return view('front.activities.show', compact('activity'));
    }
}
