<?php

namespace App\Providers;

use App\Repositories\Relationship\RelationshipRepository;
use App\Repositories\Relationship\RelationshipRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RelationshipRepositoryProvider extends ServiceProvider
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
            RelationshipRepositoryInterface::class,
            RelationshipRepository::class
        );
    }
}
