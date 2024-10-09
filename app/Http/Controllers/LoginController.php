<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard-general-dashboard');
        }

        // Debugging statement
        Log::info('Login failed for user: ' . $request->input('email'));

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
