<?php

use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CrearAnuncioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;

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

// redirigir al perfil
Route::get('/app/user/{id}', [AuthController::class, 'showPerfil']);

// Ruta para cambiar contraseña
Route::post('/app/changePassword', [AuthController::class, 'changePassword']);

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout']);

// redirigir al anuncio
Route::get('/app/anuncio/{id}', [AnuncioController::class, 'showAnuncio']);

// Ruta para crear un anuncio
Route::get('/app/vender', [CrearAnuncioController::class, 'showCrearAnuncio']);

// Ruta para crear un anuncio
Route::post('/app/crearAnuncio', [CrearAnuncioController::class, 'crearAnuncio']);

// Actualizar foto de perfil
Route::post('/app/user/profile-image', [PerfilController::class, 'updateProfileImage']);

// Ruta para acceder a los mensajes 
Route::get('/app/chat/{id?}', [ChatController::class, 'showChat']);

// Ruta para crear un chat
Route::get('/app/chat/create/{user}', [ChatController::class, 'createChat']);

// Ruta para crear un mensaje
Route::post('/app/chat/{id}/send', [ChatController::class, 'createMensaje']);

