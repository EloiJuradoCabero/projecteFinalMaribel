<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (){
    return redirect('auth');
});
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('auth', [LoginController::class, 'login'])->name('auth');
Route::post('check', [AuthController::class, 'check']);
Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('users', [UsersController::class, 'users'])->name('users');
Route::get('reservas', [\App\Http\Controllers\ReservasController::class, 'index'])->name('reservas');
Route::post('reservar/{jocId}', [\App\Http\Controllers\ReservasController::class, 'reservar'])->name('reservar');
