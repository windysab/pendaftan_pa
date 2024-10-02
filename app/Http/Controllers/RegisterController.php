<?php
// app/Http/Controllers/RegisterController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('pages.auth-register', ['type_menu' => 'auth']);
    }

    public function register(Request $request)
    {
        Log::info('Register method called');

        try {
            $validatedData = $request->validate([
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            Log::info('Validation passed', $validatedData);

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Log::info('User created', ['user' => $user]);

            return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
        } catch (\Exception $e) {
            Log::error('Error creating user', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat membuat akun.']);
        }
    }
}
