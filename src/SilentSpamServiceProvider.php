<?php

namespace Breadthe\SilentSpam;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class SilentSpamServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-silent-spam-filter');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-silent-spam-filter');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->publishes([
            __DIR__ . '/../config/silentspam.php' => config_path('silentspam.php'),
        ], 'silentspam-config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-silent-spam-filter'),
        ], 'views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/laravel-silent-spam-filter'),
        ], 'assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-silent-spam-filter'),
        ], 'lang');*/

        if ($this->app->runningInConsole()) {
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
        if (File::exists(__DIR__ . '/../config/silentspam.php')) {
            $this->mergeConfigFrom(__DIR__ . '/../config/silentspam.php', 'silentspam');
        }

        // Register the main class to use with the facade
        $this->app->singleton('silent-spam', function ($app) {
            return new SilentSpam();
        });
    }
}
