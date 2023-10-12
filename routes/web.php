<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\AuthController;
use App\Http\Controllers\Api\V1\Admin\DashboardController;

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
    return redirect()->route('dashboard.page');
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
});
