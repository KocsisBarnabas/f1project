<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DriverController;

// Csapatok CRUD műveletei
Route::get('/teams', [TeamController::class, 'index']);
Route::post('/teams', [TeamController::class, 'store']);
Route::get('/teams/{team}', [TeamController::class, 'show']);
Route::put('/teams/{team}', [TeamController::class, 'update']);
Route::delete('/teams/{team}', [TeamController::class, 'destroy']);

// Versenyzők CRUD műveletei
Route::get('/drivers', [DriverController::class, 'index']);
Route::post('/drivers', [DriverController::class, 'store']);
Route::get('/drivers/{driver}', [DriverController::class, 'show']);
Route::delete('/drivers/{driver}', [DriverController::class, 'destroy']);

// Speciális szűrés versenyzők listázására csapat ID alapján
Route::get('/drivers', [DriverController::class, 'index']);