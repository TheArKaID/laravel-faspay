<?php

namespace TheArKaID\LaravelFaspay\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelFaspayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Resources/Config/faspay.php' => config_path('faspay.php'),
        ]);
    }
}
