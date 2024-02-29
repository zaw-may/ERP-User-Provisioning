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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    if (auth() -> check()) {
        return redirect('/dashboard');
    } else {
        return redirect('/dashboard/login');
    }
});

Route::get('/dashboard/login', [AuthController::class, 'index']) -> name('login');
Route::post('/dashboard/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    if (auth() -> check ()) {
        return view('components.dashboard');
    } else {
        return redirect('/dashboard/login');
    }
}) -> name('dashboard');

Route::post('/dashboard/signout', [AuthController::class, 'signout']) -> name('logout');

Route::resource('/dashboard/users', UserController::class);
Route::resource('/dashboard/users', RoleController::class);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
