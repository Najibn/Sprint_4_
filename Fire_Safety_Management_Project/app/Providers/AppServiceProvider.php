<?php

namespace App\Providers;

use routes;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
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
    Gate::define('isAdmin', fn($user) => $user->role === 'admin');
    Gate::define('isCustomer', fn($user) => $user->role === 'customer');
    Gate::define('isTechnician', fn($user) => $user->role === 'technician');
    }
}
