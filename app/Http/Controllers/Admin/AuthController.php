<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminSessionAuth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        $expectedUser = (string) env('ADMIN_USER', '');
        $expectedPassword = (string) env('ADMIN_PASSWORD', '');

        $isConfigured = $expectedUser !== '' && $expectedPassword !== '';

        return view('admin.auth.login', [
            'isConfigured' => $isConfigured,
        ]);
    }

    public function login(Request $request)
    {
        $expectedUser = (string) env('ADMIN_USER', '');
        $expectedPassword = (string) env('ADMIN_PASSWORD', '');

        if ($expectedUser === '' || $expectedPassword === '') {
            return back()->withErrors([
                'login' => 'Admin credentials not configured. Set ADMIN_USER and ADMIN_PASSWORD in .env',
            ]);
        }

        $data = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $ok = hash_equals($expectedUser, (string) $data['username'])
            && hash_equals($expectedPassword, (string) $data['password']);

        if (!$ok) {
            return back()
                ->withErrors(['login' => 'Username atau password salah.'])
                ->withInput($request->only('username'));
        }

        $request->session()->put(AdminSessionAuth::SESSION_KEY, true);
        $request->session()->regenerate();

        $intended = (string) $request->session()->pull(AdminSessionAuth::INTENDED_URL_KEY, '');

        return redirect()->to($intended !== '' ? $intended : route('admin.dashboard'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget([AdminSessionAuth::SESSION_KEY, AdminSessionAuth::INTENDED_URL_KEY]);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
