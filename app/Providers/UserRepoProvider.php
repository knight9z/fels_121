<?php

namespace App\Providers;

use App\Repositories\User\UserRepo;
use App\Repositories\User\UserRepoInterface;
use Illuminate\Support\ServiceProvider;

class UserRepoProvider extends ServiceProvider
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
            UserRepoInterface::class,
            UserRepo::class
        );
    }
}
