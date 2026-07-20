<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $user = Auth::user();

        // Eliminar la imagen anterior
        if ($user->profile_image && Storage::disk('s3')->exists($user->profile_image)) {
            Storage::disk('s3')->delete($user->profile_image);
        }

        // Subir la nueva imagen
        $path = Storage::disk('s3')->putFile('avatars', $request->file('avatar'));

        // Guardar la ruta
        $user->profile_image = $path;
        $user->save();

        // FORZAR LA ACTUALIZACIÓN DEL USUARIO EN LA SESIÓN ACTIVA
        auth()->setUser($user);

        return back()->with('success', 'Foto actualizada correctamente.');
    }
}
