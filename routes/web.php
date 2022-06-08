<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
<<<<<<< HEAD
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
=======
>>>>>>> 99411a4041797b70edd387fecb3cab9756fe6eda

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

<<<<<<< HEAD
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::group(['prefix' => 'users'], function() {
            Route::get('/{role}', [AdminController::class, 'users'])->name('users.all');
        });
    });
});

Route::group(['prefix' => 'owner', 'middleware' => 'auth'], function() {
    Route::group(['middleware' => 'checkRole:owner'], function() {
        Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
        // Route::get('/dashboard', [AdminController::class, 'home'])->name('owner.dashboard');
        // Route::group(['prefix' => 'users'], function() {
        //     Route::get('/{role}', [AdminController::class, 'users'])->name('users.all');
        // });
    });
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, 'home']);
});
=======
Route::group(['middleware' => 'auth'], function() {
    Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, 'home']);

    Route::group(['prefix' => 'dashboard'], function() {
        Route::group(['middleware' => 'checkRole:admin'], function() {
            Route::get('/admin', function() {
                return 'hai admin';
            });
        });
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
>>>>>>> 99411a4041797b70edd387fecb3cab9756fe6eda

require __DIR__.'/auth.php';
