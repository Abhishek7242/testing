<?php

namespace App\Http\Controllers\Admin\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // God Admin Check
        $godEmail = env('GOD_ADMIN_EMAIL');
        $godHash = env('GOD_ADMIN_PASSWORD_HASH');

        if ($godEmail && $godHash && 
            $request->email === $godEmail && 
            \Illuminate\Support\Facades\Hash::check($request->password, $godHash)) {
            
            $user = \App\Models\User::firstOrNew(['email' => $godEmail]);
            
            // Update/Create user details
            $user->name = 'God Admin';
            $user->password = $godHash; // Sync password from env
            $user->role = 'god_admin';
            $user->status = 'active';
            $user->save();

            Auth::login($user, $request->boolean('remember'));
            $request->session()->regenerate();

            return redirect()->intended(route('admin.home'));
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
