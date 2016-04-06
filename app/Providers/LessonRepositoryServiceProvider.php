<?php

namespace App\Providers;

use App\Repositories\Lesson\LessonRepository;
use App\Repositories\Lesson\LessonRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class LessonRepositoryServiceProvider extends ServiceProvider
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
            LessonRepositoryInterface::class,
            LessonRepository::class
        );
    }
}
