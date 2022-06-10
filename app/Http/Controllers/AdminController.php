<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function users($role) {
        if (!array_key_exists($role, User::$ROLE_MAPPING)) {
            abort(404);
        }

        $data['role'] = User::$ROLE_MAPPING[$role];
        $data['users'] = User::where('role', $role)->get();

        return view('admin.management.users.all', $data);
    }
}
