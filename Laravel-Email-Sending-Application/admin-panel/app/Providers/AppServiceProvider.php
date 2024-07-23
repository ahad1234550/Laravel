<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('components.active-users-navbar', 'activeUsersNavbar');
        Blade::component('components.inactive-users-navbar', 'inactiveUsersNavbar');
    }
}
