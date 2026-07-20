<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use Illuminate\Support\Facades\Auth;

class AnuncioController extends Controller
{
    public function showAnuncio($id)
{
    $user = Auth::user();

    $anuncio = Anuncio::join('users', 'anuncios.user_id', '=', 'users.id')
        ->select('anuncios.*', 'users.name as nombre_usuario', 'users.profile_image as foto_vendedor')
        ->where('anuncios.id', $id)
        ->first();

    return view('app.anuncio', compact('user', 'anuncio'));
}
}
