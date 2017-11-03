<?php

namespace BartoszF\SimpleAnalytics;

use Illuminate\Support\ServiceProvider;

class AnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'simple_analytics');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/simple_analytics'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('BartoszF\SimpleAnalytics\SimpleAnalyticsController');
    }
}
