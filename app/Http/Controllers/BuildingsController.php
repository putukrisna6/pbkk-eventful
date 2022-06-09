<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Building;

class BuildingsController extends Controller
{
    public function index() {
        $building = Building::all();
        return view('owner.buildings.index', compact('building'));
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

        $data = [
            'name' => $request->name,
            'text' => $request->text,
            'address' => $request->address,
            'phone' => $request->phone,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => base64_encode(file_get_contents($request->file('image')->path())),
            'user_id' => Auth::user()->id,
        ];

        $building = new Building;
        $building->insert($data);

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

    public function delete($id) {
        $building = Building::find($id);
        $building->delete();
        return redirect()->route('buildings.index');
    }

}
