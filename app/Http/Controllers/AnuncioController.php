<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\ImagenesCoches;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

            // Varias imágenes
            'imagenes'        => 'nullable|array|max:10',
            'imagenes.*'      => 'image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $user = Auth::user();

        // Crear el anuncio
        $anuncio = Anuncio::create([
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
        ]);

        // Guardar imágenes
        if ($request->hasFile('imagenes')) {

            $orden = 1;

            foreach ($request->file('imagenes') as $imagen) {

                $path = Storage::disk('anuncios')->putFile('coches', $imagen);

                $url = 'https://poronftkafxcbnvvsxco.supabase.co/storage/v1/object/public/anuncios/' . $path;

                // La primera imagen será la principal
                if ($orden === 1) {
                    $anuncio->foto_principal = $url;
                    $anuncio->save();
                }

                ImagenesCoches::create([
                    'anuncio_id' => $anuncio->id,
                    'ruta'       => $url,
                    'orden'      => $orden,
                ]);

                $orden++;
            }
        }

        return redirect('/app')->with('success', 'Anuncio publicado correctamente.');
    }


    public function eliminarAnuncio($id)
    {
        $anuncio = Anuncio::with('imagenes')->findOrFail($id);

        // Comprobar que el anuncio pertenece al usuario autenticado
        if ($anuncio->user_id != Auth::id()) {
            abort(403);
        }

        // Eliminar las imágenes del Storage
        foreach ($anuncio->imagenes as $imagen) {

            $ruta = str_replace(
                'https://poronftkafxcbnvvsxco.supabase.co/storage/v1/object/public/anuncios/',
                '',
                $imagen->ruta
            );

            if (Storage::disk('anuncios')->exists($ruta)) {
                Storage::disk('anuncios')->delete($ruta);
            }
        }

        // Eliminar el anuncio (las imágenes de la BD se eliminan por cascade)
        $anuncio->delete();

        return back()->with('success', 'Anuncio eliminado correctamente.');
    }
}
