<?php

namespace App\Http\Controllers;
use App\Models\Packing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PackingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show($id) {
        $packing = Packing::where('journey_id', $id)->get();

        return view('journeys.packing', ['packing' => $packing, 'journey_id' => $id]);
    }

    public function showForDestination($id) {
        $packing = Packing::where('journey_id', $id)->get();

        return view('journeys.show', ['packing' => $packing]);
    }

    public function store(Request $request) {
        $packing = new Packing();

        $journeyIdFromUrl = $request->route('id');

        $packing->user_id = Auth::id();
        $packing->journey_id = $journeyIdFromUrl;
        $packing->items = request('items');

        $packing->save();

        return back();
    }

    public function destroy($id) {
        $packing = Packing::findOrFail($id);
        $packing->delete();

        return back();
    }

    public function edit($id) {
        $packing = Packing::findOrFail($id);
        return view('journeys.edit_packing', compact('packing'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'items' => 'required|string|max:255'
        ]);

        $packing = Packing::findOrFail($id);
        $packing->items = $request->items;
        $packing->save();

        return redirect()->route('journeys.show', $packing->journey_id);
    }
}
