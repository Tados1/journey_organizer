<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Journey;
use App\Models\Packing;
use App\Models\Departure;
use App\Models\Day;
use App\Models\Arrival;
use Illuminate\Support\Facades\DB;

class JourneyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show($id) {
        $journey = Journey::find($id);
        $packing = Packing::where('journey_id', $id)->get();
        $departure = Departure::where('journey_id', $id)->get();
        $day = Day::where('journey_id', $id)->get();
        $arrival = Arrival::where('journey_id', $id)->get();

        return view('journeys.show', compact('journey', 'packing', 'departure', 'day', 'arrival'));
    }

    public function create() {
        return view('journeys.create');
    }

    public function store() {
        $journey = new Journey();

        $journey->user_id = Auth::id();
        $journey->title = request('title');
        $journey->more_info = request('more_info');

        $journey->save();

        return redirect('/home');
    }
    
    public function destroy($id) {
        DB::beginTransaction();

        try {
            // Vymazanie Journey
            $journey = Journey::findOrFail($id);
            $journey->delete();

            Packing::where('journey_id', $id)->delete();
            Departure::where('journey_id', $id)->delete();
            Day::where('journey_id', $id)->delete();
            Arrival::where('journey_id', $id)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/home')->with('error', 'An error occurred while deleting the records.');
        }

        return redirect('/home');
    }
}
