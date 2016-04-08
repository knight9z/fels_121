<?php

namespace App\Providers;

use App\Repositories\UserLesson\UserLessonRepository;
use App\Repositories\UserLesson\UserLessonRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserLessonRepositoryProvider extends ServiceProvider
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
           UserLessonRepositoryInterface::class,
           UserLessonRepository::class
       );
    }
}
