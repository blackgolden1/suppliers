<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isSupplier',function($user){
            return $user -> role -> name  == 'proveedor';
        });
        Gate::define('isAdmin',function($user){
            //dd($user -> role -> name);
            return $user -> role -> name == 'admin';
        });


    }
}
