<?php

namespace App\Providers;

use App\Services\JalaliDate;
use Illuminate\Support\ServiceProvider;

class JalaliDateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('JalaliDate',function()
        {
            return new JalaliDate();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
