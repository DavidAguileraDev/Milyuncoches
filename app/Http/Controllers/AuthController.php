<?php

namespace App\Http\Controllers;

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

        // Validar los datos recibidos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Recoger los datos del formulario
        $email = $request->input('email');
        $password = $request->input('password');

        // Buscar el usuario por email
        $user = User::where('email', $email)->first();

        // Comprobar que el usuario existe
        if (!$user) {
            return back()->with('error', 'El usuario no existe.');
        }

        // Comprobar que la contraseña es correcta
        if (!Hash::check($password, $user->password)) {
            return back()->with('error', 'La contraseña es incorrecta.');
        }

        // Iniciar sesión
        Auth::login($user);

        // Redirigir a la página principal
        return redirect('/app');
    }

    // funcion para retornar la vista login
    public function showApp()
    {
        return view('app.layout');
    }
}
