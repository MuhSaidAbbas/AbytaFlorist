<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showAdminLogin()
    {
        return view('admin.login'); // admin login
    }

    public function login(Request $request)
    {
        // VALIDASI MANUAL AGAR BISA POPUP
        if (!$request->filled('email') && !$request->filled('password')) {
            return back()->withInput()->with('login_error', 'Email dan password wajib diisi.');
        }

        if (!$request->filled('email')) {
            return back()->withInput()->with('login_error', 'Email wajib diisi.');
        }

        if (!$request->filled('password')) {
            return back()->withInput()->with('login_error', 'Password wajib diisi.');
        }

        // AUTHENTICATION
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withInput()->with('login_error', 'Email atau password salah.');
        }

        // LOGIN BERHASIL
        $request->session()->regenerate();

        // ADMIN → popup admin
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.login.success');
        }

        // USER → langsung ke home / dashboard
        return redirect()->route('home');
    }



    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role'     => 'user', // ⛔ REGISTER SELALU USER
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login.');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.logout.success');

    }
}
