<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MahmoudBirdsol\CORSLaravel\CORSHelper;
use MahmoudBirdsol\CORSLaravel\CORSMiddleware;

class CORSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the config files.
        $this->publishes([
            $this->configPath() => config_path('cors.php'),
        ]);

        $this->app['router']->middleware('cors', CORSMiddleware::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'cors');

        $this->app->singleton(CORSHelper::class, function($app){
            return new CORSHelper($app['config']->get('cors'));
        });
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function configPath()
    {
        return __DIR__ . '/../config/cors.php';
    }
}
