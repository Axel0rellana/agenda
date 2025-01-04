<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::get('/', function () {
  return view('auth.login');
});

Route::resource('evento', EventoController::class)->middleware('auth');

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => 'auth'], function () {
  Route::get('/', [EventoController::class, 'index'])->name('evento');
  Route::post('/evento/mostrar', [EventoController::class, 'show']);
  Route::post('/evento/agregar', [EventoController::class, 'store']);
  Route::post('/evento/editar/{id}', [EventoController::class, 'edit']);
  Route::post('/evento/actualizar/{evento}', [EventoController::class, 'update']);
  Route::post('/evento/borrar/{id}', [EventoController::class, 'destroy']);
});
