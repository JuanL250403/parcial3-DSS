<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VideojuegoController;
use App\Http\Resources\VentaCollection;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/auth', [UserController::class, 'login'])->name('auth');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::resource('videojuegos', VideojuegoController::class)->middleware('auth');
Route::resource('ventas', VentaController::class)->middleware('auth');
