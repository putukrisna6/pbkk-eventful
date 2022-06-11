<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/admin/dashboard');
        }
        else if(auth()->user()->role == 'tenant') {
            return redirect('/');
        }
        else if(auth()->user()->role == 'owner') {
            return redirect('/owner/dashboard');
        }
        else {
            return auth()->logout();
        }
    }
}
