<?php

namespace Khutachan\LaraFilePreviewer;

use Illuminate\Support\ServiceProvider;

class LaraFilePreviewerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'lara-file-previewer');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lara-file-previewer');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('lara-file-previewer.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([  
                __DIR__.'/../resources/views' => resource_path('views/vendor/lara-file-previewer'),
            ], 'views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/lara-file-previewer'),
            ], 'assets');

            // Publishing the translation files.
            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/lara-file-previewer'),
            ], 'lang');

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'lara-file-previewer');

        // Register the main class to use with the facade
        $this->app->singleton('lara-file-previewer', function () {
            return new LaraFilePreviewer;
        });

        $this->app->bind('LaraFilePreviewer', function($app) {
            return new LaraFilePreviewer();
        });
    }
}
