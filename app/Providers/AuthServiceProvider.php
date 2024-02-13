<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Partner;
use App\Models\Project;
use App\Models\User;
use App\Policies\UserPolicy;
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
        User::class =>UserPolicy::class,
        Partner::class =>UserPolicy::class,
        Project::class =>UserPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
    }
}
