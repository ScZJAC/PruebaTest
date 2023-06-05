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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* provincias */
Route::get('/provincias', [App\Http\Controllers\ProvinciasController::class, 'index'])->name('provincias');
Route::get('/provincias/create', [App\Http\Controllers\ProvinciasController::class, 'create'])->name('provincias.create');
Route::post('/provincias/store', [App\Http\Controllers\ProvinciasController::class, 'store'])->name('provincias.store');
Route::get('/provincias/{provincia}/edit', [App\Http\Controllers\ProvinciasController::class, 'edit'])->name('provincias.edit');
 Route::put('/provincias/{provincia}', [App\Http\Controllers\ProvinciasController::class, 'update'])->name('provincias.update'); 
 Route::put('/provincias/{provincia}/eliminar', [App\Http\Controllers\ProvinciasController::class, 'eliminar'])->name('provincias.eliminar'); 