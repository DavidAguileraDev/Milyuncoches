<?php

namespace App\Http\Controllers;

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
            ->get();

        if ($id) {
            $chatSeleccionado = Chat::with('mensajes.user')->find($id);
        } else {
            $chatSeleccionado = Chat::with('mensajes.user')->find(optional($chats->first())->id);
        }

        return view('app.chat', compact('user', 'chats', 'chatSeleccionado'));
    }

    public function createChat($userId)
    {
        $user1 = min(Auth::id(), $userId);
        $user2 = max(Auth::id(), $userId);

        // Buscar si ya existe el chat
        $chat = Chat::where('user1_id', $user1)
            ->where('user2_id', $user2)
            ->first();

        // Si no existe, lo creamos
        if (!$chat) {
            $chat = Chat::create([
                'user1_id' => $user1,
                'user2_id' => $user2,
            ]);
        }

        // Siempre acabamos abriendo el chat
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
