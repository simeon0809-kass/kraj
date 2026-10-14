<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use App\Models\Visit;
use App\Services\SecurityLogger;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VisitBookingController extends Controller
{
    public function getAvailableSlots(Request $request)
    {
        $date = Carbon::parse($request->date);
        $dayOfWeek = $date->dayOfWeekIso; // 1 to 7

        $slots = TimeSlot::where('day_of_week', $dayOfWeek)->get();
        $availableSlots = [];

        foreach ($slots as $slot) {
            // Format the time string to match what you save in the 'visits' table
            $timeString = Carbon::parse($slot->start_time)->format('H:i') . ' - ' . Carbon::parse($slot->end_time)->format('H:i');

            $bookedCount = Visit::where('date', $date->toDateString())
                ->where('time', $timeString)
                ->count();

            $remainingSpots = $slot->max_capacity - $bookedCount;

            if ($remainingSpots > 0) {
                $availableSlots[] = [
                    'time' => $timeString,
                    'available_spots' => $remainingSpots
                ];
            }
        }


        return response()->json($availableSlots);
    }

    public function store(Request $request)
    {
        // 1. Check if they already have an active visit in their session
        if (session()->has('active_visit_id')) {
            return back()->with('error', 'Веќе имате закажано посета. (You already have a scheduled visit)');
        }

        // 2. Generate a random 5-digit code
        $code = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);

        // 3. Create the visit
        $visit = Visit::create([
            'visit_code' => $code,
            'session_id' => session()->getId(),
            'date' => $request->date,
            'time' => $request->time,
            'prisoner_num' => $request->prisoner_num,
            'visitors' => $request->visitors,
            'phone' => $request->phone,
            'has_children' => $request->has('has_children'),
            'children_names' => $request->children_names,
            'declared_items' => $request->declared_items,
        ]);

        // 4. Save the visit ID to their browser session
        session(['active_visit_id' => $visit->id]);

        SecurityLogger::log('visit_created', $request, 'visit', $visit->id, $visit->visit_code);

        // 5. Redirect back with the code
        return back()->with([
            'success_booking' => true,
            'visit_code' => $code
        ]);
    }

    public function cancel(Request $request)
    {
        $visitId = session('active_visit_id');
        
        if (!$visitId) {
            return back();
        }

        $visit = Visit::find($visitId);

        if ($visit) {
            $visitDate = Carbon::parse($visit->date)->startOfDay();
            $today = Carbon::now()->startOfDay();

            if ($visitDate->greaterThan($today)) {
                SecurityLogger::log('visit_cancelled', $request, 'visit', $visit->id, $visit->visit_code);
                $visit->delete();
                session()->forget('active_visit_id');
                return back()->with('cancel_success', 'Вашата посета е успешно откажана.');
            } else {
                return back()->with('error', 'Посетата може да се откаже само до еден ден пред терминот.');
            }
        }

        session()->forget('active_visit_id');
        return back();
    }
}
