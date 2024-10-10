<?php
namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Session;

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
        // Validasi input
        $validator = Validator::make($input, [
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        try {
            $user = User::create([
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            // Set session untuk notifikasi sukses
            Session::flash('success', 'Akun berhasil dibuat. Silakan login.');

            return $user;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
