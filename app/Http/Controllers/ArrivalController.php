<?php

namespace App\Http\Controllers;
use App\Models\Arrival;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArrivalController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show($id) {
        return view('journeys.arrival', compact('id'));
    }

    public function store(Request $request) {
        $arrival = new Arrival();

        $journeyIdFromUrl = $request->route('id');

        $arrival->user_id = Auth::id();
        $arrival->journey_id = $journeyIdFromUrl;
        $arrival->transport_type = request('transport_type');
        $arrival->departure_time = request('departure_time');
        $arrival->arrival_time = request('arrival_time');
        $arrival->from_place = request('from_place');
        $arrival->to_place = request('to_place');
        $arrival->arrival_info = request('arrival_info');

        $arrival->save();

        return back();
    }

    public function destroy($id) {
        $arrival = Arrival::findOrFail($id);
        $arrival->delete();

        return back();
    }

    public function edit($id) {
        $arrival = Arrival::findOrFail($id);
        return view('journeys.edit_arrival', compact('arrival'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'transport_type' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'from_place' => 'required|string|max:255',
            'to_place' => 'required|string|max:255',
            'arrival_info' => 'nullable|string|max:255',
        ]);

        $arrival = Arrival::findOrFail($id);
        $arrival->transport_type = $request->transport_type;
        $arrival->departure_time = $request->departure_time;
        $arrival->arrival_time = $request->arrival_time;
        $arrival->from_place = $request->from_place;
        $arrival->to_place = $request->to_place;
        $arrival->arrival_info = $request->arrival_info;
        $arrival->save();

        return redirect()->route('journeys.show', $arrival->journey_id);
    }
}
