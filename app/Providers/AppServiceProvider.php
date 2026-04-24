<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Goal;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\Policies\GoalPolicy;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Goal::class => GoalPolicy::class,
    ];

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
        Gate::policy(Goal::class, GoalPolicy::class);
    }
}
