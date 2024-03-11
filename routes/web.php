<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


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


Route::get('/', function() {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () { return redirect('/dashboard'); });
    Route::get('/dashboard/login', [AuthController::class, 'index'])->name('login');
    Route::post('/dashboard/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () { return view('components.dashboard');})->name('dashboard');
    Route::resource('/dashboard/users', UserController::class);
    Route::resource('/dashboard/roles', RoleController::class);
    Route::post('/dashboard/signout', [AuthController::class, 'signout'])->name('logout');
});
