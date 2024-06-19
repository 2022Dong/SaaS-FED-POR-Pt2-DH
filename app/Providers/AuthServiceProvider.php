<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Listing;
use App\Policies\UserPolicy;
use App\Policies\ListingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Listing::class => ListingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
