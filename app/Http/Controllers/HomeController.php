<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;

class HomeController extends Controller
{
    public function welcome() {
        $buildings = Building::where('status', array_search('AVAILABLE', Building::$STATUS))->limit(4)->get();
        return view('welcome', compact('buildings'));
    }

    public function catalogue() {
        $buildings = Building::where('status', array_search('AVAILABLE', Building::$STATUS))->get();
        return view('catalogue', compact('buildings'));
    }
}
