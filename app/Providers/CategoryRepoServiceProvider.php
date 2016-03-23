<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepo;
use App\Repositories\Category\CategoryRepoInterface;
use Illuminate\Support\ServiceProvider;

class CategoryRepoServiceProvider extends ServiceProvider
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
            CategoryRepoInterface::class,
            CategoryRepo::class
        );
    }
}
