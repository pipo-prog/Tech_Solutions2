<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('proyectos.index');
        }
        return view('auth.register');
    }

    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:usuarios,correo',
            'clave' => 'required|string|min:6|confirmed',
        ]);

        $usuario = Usuario::create([
            'nombre' => $validated['nombre'],
            'correo' => $validated['correo'],
            'clave' => Hash::make($validated['clave']),
        ]);

        Auth::login($usuario);

        return redirect()->route('proyectos.index')->with('success', 'Registro completado e inicio de sesión automático realizado.');
    }

    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('proyectos.index');
        }
        return view('auth.login');
    }

    /**
     * Handle user authentication.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'correo' => 'required|string|email',
            'clave' => 'required|string',
        ]);

        // Attempt authentication using 'correo' and custom password (clave) mapped to 'password'
        if (Auth::attempt(['correo' => $credentials['correo'], 'password' => $credentials['clave']])) {
            $request->session()->regenerate();
            return redirect()->intended(route('proyectos.index'))->with('success', 'Bienvenido de vuelta.');
        }

        return back()->withErrors([
            'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('correo');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Sesión cerrada exitosamente.');
    }
}
