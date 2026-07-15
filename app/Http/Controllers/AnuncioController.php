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

        $anuncio = Anuncio::findOrFail($id);

        return view('app.anuncio', compact('user', 'anuncio'));
    }
}
