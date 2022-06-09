<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Building;

class BuildingsController extends Controller
{
    public function index() {
        $buildings = Building::where('user_id', Auth::id())->get();
        return view('owner.buildings.index', compact('buildings'));
    }

    public function create() {
        return view('owner.buildings.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string', 'max:1000'],
            'address' => ['required', 'string', 'max:1000'],
            'phone' => ['required', 'string', 'max:1000'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'image' => ['required', 'image'],
        ]);

        $building = new Building;

        $building->name = $request->name;
        $building->text = $request->text;
        $building->address = $request->address;
        $building->phone = $request->phone;
        $building->latitude = $request->latitude;
        $building->longitude = $request->longitude;
        $building->image = base64_encode(file_get_contents($request->file('image')->path()));
        $building->user_id = Auth::user()->id;

        $building->save();
        session()->flash('success', 'Building created successfully.');
        return redirect()->route('buildings.index');
    }

    public function edit($id) {
        $building = Building::find($id);
        return view('owner.buildings.edit', compact('building'));
    }

    public function update(Request $request, $id) {
        $building = Building::find($id);
        $building->update($request->all());
        return redirect()->route('buildings.index');
    }

    public function show($id) {
        $building = Building::find($id);
        return view('owner.buildings.show', compact('building'));
    }

    public function destroy($id) {
        $building = Building::find($id);
        $building->delete();
        session()->flash('success', 'Building deleted successfully.');
        return redirect()->route('buildings.index');
    }
}
