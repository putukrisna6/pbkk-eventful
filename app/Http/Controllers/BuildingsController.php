<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildingsController extends Controller
{
    public function index() {
        return view('owner.buildings.index');
    }

    public function create() {
        return view('owner.buildings.create');
    }
}
