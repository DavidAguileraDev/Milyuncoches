<?php

use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Ruta que apunta a login (dominio)
Route::get('/', [AuthController::class, 'showLogin']);

//Ruta que apunta a login -> (dominio/login)
Route::get('/login', [AuthController::class, 'showLogin']);

//Ruta para loggearse
Route::post('/login', [AuthController::class, 'login']);

//Ruta que apunta a login -> (dominio/register)
Route::get('/register', [AuthController::class, 'showRegister']);

//Ruta para crear el usuario
Route::post('/register', [AuthController::class, 'createUser']);

// redirigir a la app principal
Route::get('/app', [AuthController::class, 'showApp']);

// redirigir al anuncio
Route::get('/app/anuncio/{id}', [AnuncioController::class, 'showAnuncio']);

// redirigir al perfil
Route::get('/app/user/{id}', [AuthController::class, 'showPerfil']);

// Ruta para cambiar contraseña
Route::post('/app/changePassword', [AuthController::class, 'changePassword']);

