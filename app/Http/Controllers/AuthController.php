<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // funcion para retornar la vista login
    public function showLogin()
    {
        return view('auth.login');
    }

    // funcion para retornar la vista register
    public function showRegister()
    {
        return view('auth.register');
    }


    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'nullable|max:20'
        ], [
            // Personalizamos los mensajes aquí:
            'email.unique' => 'Este correo electrónico ya está registrado',
            'email.email' => 'Por favor, introduce una dirección de correo válida.',
            'password.min' => 'La contraseña es demasiado corta (mínimo 6 caracteres).',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');


        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'phone' => $phone
        ]);

        return redirect('/login');
    }

    public function login(Request $request)
    {
        // 1. Validar el formato de los datos recibidos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'password.min' => 'La contraseña es demasiado corta (mínimo 6 caracteres).',
        ]);

        // Recoger los datos del formulario
        $email = $request->input('email');
        $password = $request->input('password');

        // 2. Buscar el usuario por email
        $user = User::where('email', $email)->first();

        // Comprobar que el usuario existe
        if (!$user) {
            // Vinculamos el error directamente al campo 'email'
            return back()
                ->withErrors(['error-email' => 'Este correo electrónico no está registrado.'])
                ->withInput(); // Esto mantiene el email escrito para que no tengan que volver a ponerlo
        }

        // 3. Comprobar que la contraseña es correcta
        if (!Hash::check($password, $user->password)) {
            // Vinculamos el error directamente al campo 'password'
            return back()
                ->withErrors(['password' => 'La contraseña introducida es incorrecta.'])
                ->withInput();
        }

        // ¿Ha marcado "Remember me"?
        $remember = $request->has('remember');

        // Iniciar sesión
        Auth::login($user, $remember);

        // Redirigir a la página principal
        return redirect('/app');
    }

    // funcion para retornar la vista de la app
    public function showApp()
    {

        $user = Auth::user();
        
        $anuncios = Anuncio::all();

        return view('app.layout', compact('user', 'anuncios'));
    }
}
