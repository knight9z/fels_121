<?php

namespace App\Providers;

use App\Repositories\WordAnswer\WordAnswerRepository;
use App\Repositories\WordAnswer\WordAnswerRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class WordAnswerRepositoryProvider extends ServiceProvider
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
            WordAnswerRepositoryInterface::class,
            WordAnswerRepository::class
        );
    }
}
