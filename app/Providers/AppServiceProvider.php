<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Staff Dao Registration
        $this->app->bind('App\Contracts\Dao\Staff\StaffDaoInterface', 'App\Dao\Staff\StaffDao');

        //Staff Business logic registration
        $this->app->bind('App\Contracts\Services\Staff\StaffServiceInterface','App\Services\Staff\StaffService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
