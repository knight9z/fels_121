<?php

namespace App\Providers;

use App\Repositories\Word\WordRepository;
use App\Repositories\Word\WordRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class WordRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            WordRepositoryInterface::class,
            WordRepository::class
        );
    }
}
