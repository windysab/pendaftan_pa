<?php
namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Log;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        Log::info('Creating new user with input:', $input);

        $validator = Validator::make($input, [
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed:', $validator->errors()->toArray());
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        try {
            $user = User::create([
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            Log::info('User created:', $user->toArray());

            // Tambahkan log untuk memastikan data masuk ke database
            $userFromDb = User::find($user->id);
            Log::info('User fetched from database:', $userFromDb->toArray());

            return $user;
        } catch (\Exception $e) {
            Log::error('Error creating user:', ['message' => $e->getMessage()]);
            throw $e;
        }
    }
}
