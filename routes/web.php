<?php

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


Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('guest.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::prefix('dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('clientes')->group(function () {
        Route::get('/', [App\Http\Controllers\ClientesController::class, 'index'])->name('clientes.index');
        Route::get('/nuevo', [App\Http\Controllers\ClientesController::class, 'create'])->name('clientes.create');
        Route::post('/nuevo', [App\Http\Controllers\ClientesController::class, 'store'])->name('clientes.store');

        Route::post('/upload', [App\Http\Controllers\ClientesController::class, 'upload'])->name('clientes.upload');

        Route::get('/editar/{id}', [App\Http\Controllers\ClientesController::class, 'edit'])->name('clientes.edit');
        Route::post('/update/{id}', [App\Http\Controllers\ClientesController::class, 'update'])->name('clientes.update');
    });

    Route::prefix('vehiculos')->group(function () {
        Route::get('/', [App\Http\Controllers\VehiculosController::class, 'index'])->name('vehiculos.index');
        Route::get('/nuevo', [App\Http\Controllers\VehiculosController::class, 'create'])->name('vehiculos.create');
        Route::post('/nuevo', [App\Http\Controllers\VehiculosController::class, 'store'])->name('vehiculos.store');

        Route::get('/editar/{id}', [App\Http\Controllers\VehiculosController::class, 'edit'])->name('vehiculos.edit');
        Route::post('/update/{id}', [App\Http\Controllers\VehiculosController::class, 'update'])->name('vehiculos.update');
    });

    Route::prefix('novedades')->group(function () {
        Route::get('/', [App\Http\Controllers\NovedadesController::class, 'index'])->name('novedades.index');
        Route::get('/nuevo', [App\Http\Controllers\NovedadesController::class, 'create'])->name('novedades.create');
        Route::post('/nuevo', [App\Http\Controllers\NovedadesController::class, 'store'])->name('novedades.store');

        Route::post('/upload', [App\Http\Controllers\NovedadesController::class, 'upload'])->name('novedades.upload');

        Route::get('/editar/{id}', [App\Http\Controllers\NovedadesController::class, 'edit'])->name('novedades.edit');
        Route::post('/update/{id}', [App\Http\Controllers\NovedadesController::class, 'update'])->name('novedades.update');
    });

    Route::prefix('entregas')->group(function () {
        Route::get('/', [App\Http\Controllers\EntregasController::class, 'index'])->name('entregas.index');
        Route::get('/nuevo', [App\Http\Controllers\EntregasController::class, 'create'])->name('entregas.create');
        Route::post('/nuevo', [App\Http\Controllers\EntregasController::class, 'store'])->name('entregas.store');

        Route::post('/upload', [App\Http\Controllers\EntregasController::class, 'upload'])->name('entregas.upload');


        Route::get('/editar/{id}', [App\Http\Controllers\EntregasController::class, 'edit'])->name('entregas.edit');
        Route::post('/update/{id}', [App\Http\Controllers\EntregasController::class, 'update'])->name('entregas.update');
    });
});
