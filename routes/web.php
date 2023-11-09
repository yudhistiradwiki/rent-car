<?php

use App\Models\Facility;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;

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

Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        // dashboard
        Route::get('/dashboard', DashboardController::class)->name('dashboard');

        // profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // user
        route::resource('/user', UserController::class, ['as' => 'admin']);

        //rentals
        Route::resource('rentals', RentalController::class, ['as' => 'admin']);

        //returns
        Route::resource('returns', ReturnController::class, ['as' => 'admin']);

        //services
        route::resource('/cars', CarController::class, ['as' => 'admin']);

        Route::get('/return', [ReturnController::class, 'returnForm'])->name('admin.returnForm');
        Route::post('/return', [ReturnController::class, 'returnCar'])->name('admin.return');
    });
});

// LANDING PAGE
Route::get('/', [LandingPageController::class, 'index'])->name('home.index');
Route::get('/daftar', [UserController::class, 'daftar'])->name('home.daftar');
Route::post('/register', [UserController::class, 'register'])->name('home.register');


require __DIR__ . '/auth.php';
