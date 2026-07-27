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

    public function showCrearAnuncio()
    {

        $user = Auth::user();

        return view('app.crearAnuncio', compact('user'));
    }

    public function crearAnuncio(Request $request)
    {
        // Validar los datos
        $request->validate([
            'marca'           => 'required|max:100',
            'modelo'          => 'required|max:100',
            'anio'            => 'required|integer|min:1900|max:' . date('Y'),
            'kilometros'      => 'required|integer|min:0',
            'combustible'     => 'required|max:50',
            'transmision'     => 'required|max:50',
            'potencia'        => 'required|integer|min:1',
            'cilindrada'      => 'required|integer|min:1',
            'tipo_vehiculo'   => 'required|max:50',
            'color'           => 'required|max:50',
            'puertas'         => 'required|integer|min:2|max:6',
            'plazas'          => 'required|integer|min:1|max:9',
            'precio'          => 'required|numeric|min:0',
            'provincia'       => 'required|max:100',
            'ciudad'          => 'required|max:100',
            'descripcion'     => 'nullable|max:3000',
            'foto_principal'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // Usuario que publica el anuncio
        $user = Auth::user();

        // Ruta de la foto (si existe)
        $rutaFoto = null;

        if ($request->hasFile('foto_principal')) {
            $rutaFoto = $request
                ->file('foto_principal')
                ->store('anuncios', 'public');
        }

        // Crear el anuncio
        Anuncio::create([
            'user_id'         => $user->id,
            'marca'           => $request->marca,
            'modelo'          => $request->modelo,
            'anio'            => $request->anio,
            'kilometros'      => $request->kilometros,
            'combustible'     => $request->combustible,
            'transmision'     => $request->transmision,
            'potencia'        => $request->potencia,
            'cilindrada'      => $request->cilindrada,
            'tipo_vehiculo'   => $request->tipo_vehiculo,
            'color'           => $request->color,
            'puertas'         => $request->puertas,
            'plazas'          => $request->plazas,
            'precio'          => $request->precio,
            'provincia'       => $request->provincia,
            'ciudad'          => $request->ciudad,
            'descripcion'     => $request->descripcion,
            'foto_principal'  => $rutaFoto,
        ]);

        return redirect('/app')->with('success', 'Anuncio publicado correctamente.');
    }

    public function eliminarAnuncio($id)
    {
        $anuncio = Anuncio::findOrFail($id);

        // Comprobar que el anuncio pertenece al usuario autenticado
        if ($anuncio->user_id != Auth::id()) {
            abort(403);
        }

        $anuncio->delete();

        return back()->with('success', 'Anuncio eliminado correctamente.');
    }
}
