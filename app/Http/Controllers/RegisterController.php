<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        Log::info('RegisterController@store: Request received', $request->all());

        $this->validator($request->all())->validate();

        try {
            $user = $this->create($request->all());
            Log::info('RegisterController@store: User created successfully', ['user_id' => $user->id]);

            auth()->login($user);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Log::error('RegisterController@store: Error creating user', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Failed to create user.']);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        Log::info('RegisterController@create: Creating user', $data);

        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
