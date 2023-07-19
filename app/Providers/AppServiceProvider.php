<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Roleadmin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user, Roleadmin $roleadmin){
             return $user->email === $roleadmin->email && $roleadmin->role === 'Admin';
        });

        Validator::extend('blocked_password', function ($attribute, $value, $parameters, $validator) {
            $blockedPasswords = [
                '12345678',
                '12345678*#',
                'admin123',
                'admin1234*#',
            ];

            return !in_array($value, $blockedPasswords);
        });
    }
}
