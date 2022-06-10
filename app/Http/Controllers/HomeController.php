<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Option;
use App\Models\Type;

class HomeController extends Controller
{
    public function welcome() {
        $buildings = Building::where('status', array_search('AVAILABLE', Building::$STATUS))->with('options')->limit(4)->get();
        return view('welcome', compact('buildings'));
    }

    public function catalogue() {
        $types = Type::all();
        $buildings = Building::where('status', array_search('AVAILABLE', Building::$STATUS))->with('options')->get();
        return view('catalogue', compact('buildings', 'types'));
    }

    public function detail(Building $building) {
        if ($building->status == array_search('AVAILABLE', Building::$STATUS)) {
            $building->load('options');
            return view('show', compact('building'));
        } else {
            return redirect()->route('welcome');
        }
    }
}
