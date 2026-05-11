<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\EstadisticaController;

/*
|--------------------------------------------------------------------------
| PAGINA PRINCIPAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD (MEJORADO)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| USUARIOS
|--------------------------------------------------------------------------
*/

Route::get('/users', [UserController::class, 'index'])
    ->middleware(['auth'])
    ->name('users.index');

/*
|--------------------------------------------------------------------------
| EQUIPOS (CRUD)
|--------------------------------------------------------------------------
*/

Route::resource('equipos', EquipoController::class);

/*
|--------------------------------------------------------------------------
| JUGADORES (CRUD)
|--------------------------------------------------------------------------
*/

Route::resource('jugadores', JugadorController::class);

/*
|--------------------------------------------------------------------------
| PARTIDOS (CRUD)
|--------------------------------------------------------------------------
*/

Route::resource('partidos', PartidoController::class);

/*
|--------------------------------------------------------------------------
| ESTADÍSTICAS 📊
|--------------------------------------------------------------------------
*/

Route::get('/estadisticas', [EstadisticaController::class, 'index'])
    ->middleware(['auth'])
    ->name('estadisticas.index');

/*
|--------------------------------------------------------------------------
| PERFIL
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

Route::get('/tabla-posiciones', [PartidoController::class, 'tablaPosiciones']);

/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';