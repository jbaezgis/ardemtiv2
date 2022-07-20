<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Home;
use App\Http\Livewire\Categorias;
use App\Http\Livewire\Usuarios;
use App\Http\Livewire\Productos;
use App\Http\Livewire\Ventas;
use App\Http\Livewire\Gastos;
use App\Http\Livewire\MenuPrincipal;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', Home::class)->name('home');
Route::get('/menu', MenuPrincipal::class)->name('menu-principal');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // Administration
    Route::get('/usuarios', Usuarios::class)->name('usuarios');
    Route::get('/productos', Productos::class)->name('productos');
    // Route::resource('users', UserController::class)->names('users');
    Route::get('/categorias', Categorias::class)->name('categorias');
    Route::get('/ventas', Ventas::class)->name('ventas');
    Route::get('/gastos', Gastos::class)->name('gastos');

});
