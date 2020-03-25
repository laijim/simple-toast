<?php

namespace Laijim\SimpleToast;

use Illuminate\Support\ServiceProvider;

class SimpleToastServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerViews();

        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'simpleToast');
    }

    /**
     * js resource and main config file
     */
    private function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../frontend' => resource_path('views/vendor/simpleToast')
        ], 'html');

        $this->publishes([
            __DIR__ . '/config/simpleToast.php' => config_path('simpleToast.php')
        ], 'config');

    }

    /**
     * register facade
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/simpleToast.php', 'simpleToast');

        $this->app->singleton('simpletoast', function ($app) {
            return $this->app->make(SimpleToast::class);//facade simpletoast
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\PublishCommand::class,
            ]);
        }
    }
}
