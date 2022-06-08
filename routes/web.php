<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::get('/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');
        Route::group(['prefix' => 'users'], function() {
            Route::get('/{role}', [AdminController::class, 'users'])->name('users.all');
        });
    });
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, 'home']);

    Route::group(['prefix' => 'dashboard'], function() {
        Route::group(['middleware' => 'checkRole:tenant'], function() {
            Route::get('/tenant', function() {
                return 'hai event organizer';
            });
        });
        Route::group(['middleware' => 'checkRole:owner'], function() {
            Route::get('/owner', function() {
                return 'hai owner';
            });
        });
    });
});

require __DIR__.'/auth.php';
