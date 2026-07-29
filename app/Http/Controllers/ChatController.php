<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Chat;
use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function showChat($id = null)
    {
        $user = Auth::user();

        $chats = Chat::where('user1_id', $user->id)
            ->orWhere('user2_id', $user->id)
            ->with('anuncio')
            ->withMax('mensajes', 'created_at')
            ->orderByDesc('mensajes_max_created_at')
            ->get();

        if ($id) {
            $chatSeleccionado = Chat::with([
                'mensajes.user',
                'anuncio'
            ])->find($id);
        } else {
            $chatSeleccionado = Chat::with([
                'mensajes.user',
                'anuncio'
            ])->find(optional($chats->first())->id);
        }

        return view('app.chat', compact('user', 'chats', 'chatSeleccionado'));
    }

    public function createChat($anuncioId)
    {
        $anuncio = Anuncio::findOrFail($anuncioId);

        $user1 = min(Auth::id(), $anuncio->user_id);
        $user2 = max(Auth::id(), $anuncio->user_id);

        $chat = Chat::firstOrCreate([
            'user1_id' => $user1,
            'user2_id' => $user2,
            'anuncio_id' => $anuncioId,
        ]);

        return redirect('/app/chat/' . $chat->id);
    }

    public function createMensaje($id, Request $request)
    {

        $request->validate([
            'mensaje' => 'required|string|max:1000',
        ]);

        $mensaje =  $request->input('mensaje');

        Mensaje::create([
            'chat_id' => $id,
            'user_id' => Auth::id(),
            'mensaje' => $mensaje
        ]);


        return redirect('/app/chat/' . $id);
    }
}
