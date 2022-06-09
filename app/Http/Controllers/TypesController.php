<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypesController extends Controller
{
    public function index() {
        $types = Type::all();
        return view('admin.management.types.index', compact('types'));
    }
}
