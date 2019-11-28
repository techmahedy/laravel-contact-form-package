<?php

namespace Codechief\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php'); //route
        $this->loadViewsFrom(__DIR__ . '/views', 'contact'); //View
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations'); //Migration

        $this->mergeConfigFrom(
            __DIR__ . '/config/contact.php',
            'contact'
        ); // getting input data from config/contact.php

        $this->publishes([
            __DIR__ . '/config/contact.php' => config_path('contact.php'),
            __DIR__ . '/views' => resource_path('views/vendor/contact'),
        ]);

    }
    public function register()
    { }
}
