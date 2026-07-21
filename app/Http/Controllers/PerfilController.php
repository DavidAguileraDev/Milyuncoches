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
        if ($user->profile_image) {

            $oldPath = str_replace(
                'https://poronftkafxcbnvvsxco.supabase.co/storage/v1/object/public/perfil/',
                '',
                $user->profile_image
            );

            if (Storage::disk('perfil')->exists($oldPath)) {
                Storage::disk('perfil')->delete($oldPath);
            }
        }

        // Subir la nueva imagen
        $path = Storage::disk('perfil')->putFile('avatars', $request->file('avatar'));

        // Guardar la URL completa
        $user->profile_image = 'https://poronftkafxcbnvvsxco.supabase.co/storage/v1/object/public/perfil/' . $path;
        $user->save();

        auth()->setUser($user);

        return back()->with('success', 'Foto actualizada correctamente.');
    }
}
