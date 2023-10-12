<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\AuthController;
use App\Http\Controllers\Api\V1\Admin\ProfileController;
use App\Http\Controllers\Api\V1\Admin\DashboardController;
use App\Http\Controllers\Api\V1\Admin\VehicleController;
use App\Http\Controllers\Api\V1\Admin\VehicleBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('vehicle.page');
});

Route::prefix('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'login'])->name('login.page');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.page');
    Route::prefix('profile')->group(function () {
        Route::get('/show', [ProfileController::class, 'show'])->name('profile.page');
        Route::get('/update/show', [ProfileController::class, 'detail'])->name('update.page');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.post');
    });
    Route::prefix('vehicle')->group(function () {
        Route::get('/all', [VehicleController::class, 'index'])->name('vehicle.page');
        Route::get('/create', [VehicleController::class, 'create'])->name('create.page');
        Route::post('/add', [VehicleController::class, 'store'])->name('create.post');
        Route::delete('/delete/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicle.delete');
        Route::get('/edit/{vehicle}', [VehicleController::class, 'edit'])->name('edit.page');
        Route::post('/update/{vehicle}', [VehicleController::class, 'update'])->name('edit.post');
    });
    Route::prefix('vehicle-booking')->group(function () {
        Route::get('/all', [VehicleBookingController::class, 'index'])->name('vehiclebooking.page');
        Route::get('/edit/{vehicle_booking}', [VehicleBookingController::class, 'edit'])->name('review.page');
        Route::post('/update/{vehicle_booking}', [VehicleBookingController::class, 'update'])->name('review.post');
    });
});
