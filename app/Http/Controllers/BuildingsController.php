<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
