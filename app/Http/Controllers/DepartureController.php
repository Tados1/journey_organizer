<?php

namespace App\Http\Controllers;
use App\Models\Departure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show($id) {
        return view('journeys.departure', compact('id'));
    }

    public function store(Request $request) {
        $departure = new Departure();

        $journeyIdFromUrl = $request->route('id');

        $departure->user_id = Auth::id();
        $departure->journey_id = $journeyIdFromUrl;
        $departure->transport_type = request('transport_type');
        $departure->departure_time = request('departure_time');
        $departure->arrival_time = request('arrival_time');
        $departure->from_place = request('from_place');
        $departure->to_place = request('to_place');
        $departure->departure_info = request('departure_info');

        $departure->save();

        return back();
    }

    public function destroy($id) {
        $departure = Departure::findOrFail($id);
        $departure->delete();

        return back();
    }

    public function edit($id) {
        $departure = Departure::findOrFail($id);
        return view('journeys.edit_departure', compact('departure'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'transport_type' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'from_place' => 'required|string|max:255',
            'to_place' => 'required|string|max:255',
            'departure_info' => 'nullable|string|max:255',
        ]);

        $departure = Departure::findOrFail($id);
        $departure->transport_type = $request->transport_type;
        $departure->departure_time = $request->departure_time;
        $departure->arrival_time = $request->arrival_time;
        $departure->from_place = $request->from_place;
        $departure->to_place = $request->to_place;
        $departure->departure_info = $request->departure_info;
        $departure->save();

        return redirect()->route('journeys.show', $departure->journey_id);
    }
}
