<?php

namespace App\Providers;

use App\Repositories\LessonWord\LessonWordRepository;
use App\Repositories\LessonWord\LessonWordRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class LessonWordRepositoryProvider extends ServiceProvider
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
            LessonWordRepositoryInterface::class,
            LessonWordRepository::class
        );
    }
}
