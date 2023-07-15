<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        // agar paginator menggunakan template bootsrap, default nya tailwind
        Paginator::useBootstrapFive();

        // mendefinisikan sebuah gate bernama admin dimana gate ini hanya bisa diakses oleh user yang username nya 'javakanaya'
        Gate::define('admin', function(User $user) {
            // kalau dia true, maka gerbangnya diakses, kunci gerbangnnya dikasih
            return $user->is_admin;
        });
    }
}
