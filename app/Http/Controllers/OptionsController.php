<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Building;
use App\Models\Option;

class OptionsController extends Controller
{
    public function optionsManage($id) {
        $building = Building::where('id', $id)->with('options')->first();

        if ($building->user_id != Auth::id() || !$this->optionsAvailable($building)) {
            session()->flash('error', 'Unauthorized building access.');
            return redirect()->route('buildings.index');
        }

        return view('owner.options.manage', compact('building'));
    }

    public function optionsAvailability(Request $request, $id) {
        $building = Building::where('id', $id)->with('options')->first();

        if ($building->user_id != Auth::id() || !$this->optionsAvailable($building)) {
            session()->flash('error', 'Unauthorized building access.');
            return redirect()->route('buildings.index');
        }

        if (!count($building->options)) {
            session()->flash('error', 'Cannot set buildings without rent options to be available.');
            return redirect()->route('owner.options.manage', ['building' => $building->id]);
        }

        (isset($request->status)) ? $building->status = $request->status : $building->status = 5;
        $building->save();

        session()->flash('success', 'Building status saved');
        return redirect()->route('owner.options.manage', ['building' => $building->id]);
    }

    public function create($id) {
        $building = Building::where('id', $id)->first();

        if ($building->user_id != Auth::id() || !$this->optionsAvailable($building)) {
            session()->flash('error', 'Unauthorized building access.');
            return redirect()->route('buildings.index');
        }

        return view('owner.options.create', compact('building'));
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'desc' => ['required', 'string'],
                'price' => ['required', 'numeric'],
                'image' => ['required', 'image'],
                'building_id' => ['required', 'numeric', 'exists:buildings,id'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $message = '';
            foreach ($e->errors() as $key => $error) {
                $message = $message . $key . ': ' . $error[0];
            }

            session()->flash('error', $message);
            return redirect()->back();
        }

        $option = new Option;

        $option->name = $request->name;
        $option->desc = $request->desc;
        $option->price = $request->price;
        $option->image = base64_encode(file_get_contents($request->file('image')->path()));
        $option->building_id = $request->building_id;

        $option->save();

        session()->flash('success', 'Option created successfully.');
        return redirect()->route('owner.options.manage', ['building' => $request->building_id]);
    }

    public function destroy(Request $request) {
        $option = Option::find($request->id);
        $building_id = $option->building_id;
        $option->delete();

        session()->flash('success', 'Option deleted successfully.');
        return redirect()->route('owner.options.manage', ['building' => $building_id]);
    }

    private function optionsAvailable(Building $building) {
        return ($building->status == array_search('AVAILABLE', Building::$STATUS) || $building->status == array_search('UNAVAILABLE', Building::$STATUS) || $building->status == array_search('APPROVED', Building::$STATUS));
    }
}
