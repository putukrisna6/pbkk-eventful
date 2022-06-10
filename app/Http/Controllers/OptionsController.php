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
        $building = Building::where('id', $id)->first();

        if ($building->user_id != Auth::id() || !$this->optionsAvailable($building)) {
            session()->flash('error', 'Unauthorized building access.');
            return redirect()->route('buildings.index');
        }

        (isset($request->status)) ? $building->status = $request->status : $building->status = 5;
        $building->save();

        session()->flash('success', 'Building status saved');
        return redirect()->route('owner.options.manage', ['building' => $building->id]);
    }

    private function optionsAvailable(Building $building) {
        return ($building->status == array_search('AVAILABLE', Building::$STATUS) || $building->status == array_search('UNAVAILABLE', Building::$STATUS) || $building->status == array_search('APPROVED', Building::$STATUS));
    }
}
