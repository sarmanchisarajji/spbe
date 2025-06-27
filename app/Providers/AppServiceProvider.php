<?php

namespace App\Providers;

use App\Models\User;
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
        Gate::Define('admin', function (User $user) {
            return $user->role == 'level1';
        });
        Gate::Define('karyawan', function (User $user) {
            return $user->role == 'level2';
        });
    }
}
