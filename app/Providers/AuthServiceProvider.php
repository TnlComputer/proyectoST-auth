<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // aca se ponen los permisos los gate

        // Gate::define('see-reports', function (User $user) {
        //     return $user->role::ROLE_ADMINISTRADOR;
        // });
        // Gate::define('register-attendance', function (User $user) {
        //     return $user->role::ROLE_USUARIO;
        // });
    }
}
