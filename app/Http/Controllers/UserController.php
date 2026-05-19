<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginUsuarioRequest $request)
    {
        $usuario = $request->validated();

        $usuarioBd =  User::where('email', $usuario['email'])->first();

        if ($usuarioBd && password_verify($usuario['password'], $usuarioBd->password)) {
            Auth::login($usuarioBd);
            return redirect('/');
        } else {
            return back()->withErrors([
                'login' => 'Credenciales incorrectas'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
