<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Building;
use App\Models\Type;
use App\Models\BuildingType;

class BuildingsController extends Controller
{
    public function index() {
        $status = Building::$STATUS;
        $buildings = Building::where('user_id', Auth::id())->get();
        return view('owner.buildings.index', compact('buildings', 'status'));
    }

    public function create() {
        $types = Type::all();
        return view('owner.buildings.create', compact('types'));
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
            'type_id' => ['required', 'exists:types,id'],
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

        $buildingType = new BuildingType;

        $buildingType->building_id = $building->id;
        $buildingType->type_id = $request->type_id;

        $buildingType->save();

        session()->flash('success', 'Building created successfully.');
        return redirect()->route('buildings.index');
    }

    public function edit(Building $building) {
        $buildingType = BuildingType::where('building_id', $building->id)->first();
        $types = Type::all();

        return view('owner.buildings.edit', compact('building', 'types', 'buildingType'));
    }

    public function update(Request $request, $id) {
        $building = Building::find($id);
        $building->update($request->all());

        $buildingType = BuildingType::where('building_id', $building->id)->first();
        $buildingType->type_id = $request->type_id;
        $buildingType->save();

        return redirect()->route('buildings.show', ['building' => $building]);
    }

    public function show(Building $building) {
        if ($building->user_id != Auth::id()) {
            session()->flash('error', 'Building not found.');
            return redirect()->route('buildings.index');
        }

        $buildingType = BuildingType::where('building_id', $building->id)->first();
        //get types name from type id
        $types = Type::find($buildingType->type_id);

        return view('owner.buildings.show', compact('building', 'types', 'buildingType'));
    }

    public function destroy($id) {
        $building = Building::find($id);
        $building->delete();
        session()->flash('success', 'Building deleted successfully.');
        return redirect()->route('buildings.index');
    }
}
