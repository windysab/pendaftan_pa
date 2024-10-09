<?php
// app/Providers/FortifyServiceProvider.php
namespace App\Providers;

use Laravel\Fortify\Fortify;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
        $this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);
    }

    public function boot()
    {
        Fortify::loginView(function () {
            return view('auth.auth-login');
        });

        Fortify::registerView(function () {
            return view('auth.auth-register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        // Define other Fortify views and actions here
    }
}
