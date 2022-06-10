<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BuildingsController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\OptionsController;


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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::group(['prefix' => 'users'], function() {
            Route::get('/{role}', [AdminController::class, 'users'])->name('users.all');
        });
        Route::group(['prefix' => 'approval'], function() {
            Route::get('/', [AdminController::class, 'approvalQueue'])->name('approval.queue');
            Route::get('/{task}', [AdminController::class, 'approvalShow'])->name('approval.show');
            Route::post('/{task}/approve', [AdminController::class, 'approveTask'])->name('approval.approve');
        });
        Route::resource('types', TypesController::class);
    });
});

Route::group(['prefix' => 'owner', 'middleware' => 'auth'], function() {
    Route::group(['middleware' => 'checkRole:owner'], function() {
        Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');

        Route::group(['prefix' => 'approval'], function() {
            Route::get('/', [OwnerController::class, 'approval'])->name('owner.approval');
            Route::get('/apply', [OwnerController::class, 'approvalApply'])->name('owner.approval.apply');
            Route::post('/', [OwnerController::class, 'approvalStore'])->name('owner.approval.store');
        });

        Route::resource('buildings', BuildingsController::class);

        Route::get('/buildings/{building}/options', [OptionsController::class, 'optionsManage'])->name('owner.options.manage');
        Route::post('/buildings/{building}/options', [OptionsController::class, 'optionsAvailability'])->name('owner.options.availability');
    });
});

Route::group(['prefix' => 'tenant', 'middleware' => 'auth'], function() {
    Route::group(['middleware' => 'checkRole:tenant'], function() {
        Route::get('/dashboard', [TenantController::class, 'dashboard'])->name('tenant.dashboard');
         Route::group(['prefix' => 'profile'], function() {
            Route::get('/', [ProfileController::class, 'profile'])->name('tenant.profile');
            // Route::get('/', [ProfileController::class, 'profileUpdate'])->name('tenant.profile');
        });

    });
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, 'home']);
});

require __DIR__.'/auth.php';
