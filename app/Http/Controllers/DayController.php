<?php

namespace App\Http\Controllers;
use App\Models\Day;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show($id) {
        return view('journeys.day', compact('id'));
    }

    public function store(Request $request) {
        $day = new Day();

        $journeyIdFromUrl = $request->route('id');

        $day->user_id = Auth::id();
        $day->journey_id = $journeyIdFromUrl;
        $day->day = request('day');
        $day->transport_type = request('transport_type');
        $day->departure_time = request('departure_time');
        $day->arrival_time = request('arrival_time');
        $day->from_place = request('from_place');
        $day->to_place = request('to_place');
        $day->description = request('description');

        $day->save();

        return back();
    }

    public function destroy($id) {
        $day = Day::findOrFail($id);
        $day->delete();

        return back();
    }

    public function edit($id) {
        $day = Day::findOrFail($id);
        return view('journeys.edit_day', compact('day'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'day' => 'required|string|max:255',
            'transport_type' => 'nullable|string|max:255',
            'departure_time' => 'nullable|date',
            'arrival_time' => 'nullable|date',
            'from_place' => 'nullable|string|max:255',
            'to_place' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $day = Day::findOrFail($id);
        $day->day = $request->day;
        $day->transport_type = $request->transport_type;
        $day->departure_time = $request->departure_time;
        $day->arrival_time = $request->arrival_time;
        $day->from_place = $request->from_place;
        $day->to_place = $request->to_place;
        $day->description = $request->description;

        $day->save();

        return redirect()->route('journeys.show', $day->journey_id);
    }
}
