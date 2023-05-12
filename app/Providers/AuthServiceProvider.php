<?php

namespace App\Providers;

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
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->type_id === 1;
        });

        Gate::define('doctor', function ($user, $visit) {
            return $user->type_id === 2 && $visit->doctor_id === $user->id;
        });

        Gate::define('patient', function ($user, $visit) {
            return $user->type_id === 3 && $visit->patient_id === $user->id;
        });
    }
}
