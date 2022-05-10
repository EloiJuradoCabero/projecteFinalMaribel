<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleatsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SalasController;
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



Route::get('reservas', [ReservasController::class, 'index'])->name('reservas');
Route::post('reservar/{jocId}', [ReservasController::class, 'reservar'])->name('reservar');
Route::get('eliminar/{userId}', [UsersController::class, 'deleteUser'])->name('deleteUser');

Route::post('modifyUser/{userId}', [UsersController::class,'modifyUser'])->name('modifyUser');
Route::get('modify', [UsersController::class, 'getUsersAdmin'])->name('modify');
Route::post('modifyUserAdmin', [UsersController::class, 'modifyUserAdmin'])->name('modifyUserAdmin');




Route::view('/reservarAdmin', 'reservarAdmin')->name('reservarAdmin');


Route::view('/modificarDades', 'dades')->name('modificarDades');
Route::view('/register', 'register')->name('register');
Route::post('/store', [\App\Http\Controllers\RegistrationController::class, 'store'])->name('store');
Route::get('/jocsProva', [\App\Http\Controllers\HomeController::class, 'getjocs'])->name('jocsProva');


//RUTAS VUE
Route::get('users', [UsersController::class, 'users'])->name('users');
Route::get('empleats', [UsersController::class, 'empleats'])->name('empleats');
Route::get('usersVue', [UsersController::class, 'getAllUsers'])->name('usersVue');
Route::get('empleatsVue', [UsersController::class, 'getAllEmpleats'])->name('empleatsVue');
Route::get('deleteUsr/{userId}', [UsersController::class, 'deleteUsr'])-> name('deleteUsr');
Route::get('modifyUsr/{userId}', [UsersController::class, 'modifyUsr'])->name('modifyUsr');
Route::get('getDataUsr', [UsersController::class, 'getDataOfUsr'])->name('getDataUsr');
Route::view('modificar', "modify");
Route::post('modificarUsr', [UsersController::class, 'modificarUsr'])->name('modificarUsr');
Route::get('deleteEmpleat/{empleatId}', [UsersController::class, 'deleteEmpleat'])->name('deleteEmpleat');
Route::get('makeEmpleat/{empleatId}', [UsersController::class, 'makeEmpleat'])->name('makeEmpleat');
Route::view('crearEmpleat', "assignEmpleat");
Route::get('makeAdmin/{empleatId}', [UsersController::class, 'makeAdmin'])->name('makeAdmin');
Route::get('getTypeOfUser' , [UsersController::class, 'getTypeOfUser'])->name('getTypeOfUser');
Route::get('getAllReservas', [ReservasController::class, 'getAllReservasVue'])->name('getAllReservas');
Route::post('assignar', [ReservasController::class, 'assignar'])->name('assignar');
Route::view('crearUsuari', 'createUser')->name('crearUsuari');
Route::get('confirmar/{reservaId}', [ReservasController::class, 'confirmar'])->name('confirmar');
Route::get('delete/{reservaId}', [ReservasController::class, 'delete'])->name('delete');
Route::post('newUser', [UsersController::class, 'newUser'])->name('newUser');
Route::post('modificarReserva', [ReservasController::class, 'modificarReserva'])->name('modificarReserva');
Route::get('/', function (){
    return redirect('auth');
});
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('auth', [LoginController::class, 'login'])->name('auth');
Route::post('check', [AuthController::class, 'check']);
Route::get('home', [HomeController::class, 'home'])->name('home');
Route::view('salas', 'salas')->name('salas');
Route::get('deleteSala/{salaId}', [SalasController::class, 'delete'])->name('deleteSala');
Route::get('getAllSalas', [SalasController::class, 'getAllSalas'])->name('getAllSalas');
Route::view('crearSala', 'createSalas')->name('crearSala');
Route::get('createSala/{name}', [SalasController::class, 'create'])->name('createSala');
Route::get('assignSalaToReserva', [SalasController::class, 'assign'])->name('assignSalaToReserva');
Route::get('getSala/{id}', [SalasController::class, 'getSalas'])->name('getSala');
Route::view('crearJoc', 'crearJoc')->name('crearJoc');

