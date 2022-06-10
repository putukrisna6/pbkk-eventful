<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;

class HomeController extends Controller
{
    public function welcome() {
        $buildings = Building::where('status', array_search('AVAILABLE', Building::$STATUS))->get();
        return view('welcome', compact('buildings'));
    }
}
