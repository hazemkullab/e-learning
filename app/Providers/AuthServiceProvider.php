<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('categories.index', function($user) {
            return $user->userHas('categories.index');
        });

        Gate::define('categories.create', function($user) {
            return $user->userHas('categories.create');
        });

        Gate::define('categories.show', function($user) {
            return $user->userHas('categories.show');
        });

        Gate::define('categories.edit', function($user) {
            return $user->userHas('categories.edit');
        });

        Gate::define('categories.delete', function($user) {
            return $user->userHas('categories.delete');
        });

        // Gate::define('categories.index', function($user) {
        //     return false;
        // });

        // Gate::define('categories.index', function($user) {
        //     return false;
        // });

        // Gate::define('categories.index', function($user) {
        //     return false;
        // });

        // Gate::define('categories.index', function($user) {
        //     return false;
        // });

        // Gate::define('categories.index', function($user) {
        //     return false;
        // });

        // Gate::define('categories.index', function($user) {
        //     return false;
        // });

        // Gate::define('categories.index', function($user) {
        //     return false;
        // });

        // Gate::define('categories.index', function($user) {
        //     return false;
        // });

        // Gate::define('categories.index', function($user) {
        //     return false;
        // });

        // Gate::define('categories.index', function($user) {
        //     return false;
        // });
    }
}
