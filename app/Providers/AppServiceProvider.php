<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $currentLanguage = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : config('constants.default_language');

        $languages = [
            [
                'iso_code' => 'en', 'is_current_lang' => false
            ],
            [
                'iso_code' => 'vi', 'is_current_lang' => false
            ]
        ];

        foreach ($languages as &$language) {
            if ($currentLanguage == $language['iso_code']) {
                $language['is_current_lang'] = true;
                break;
            }
        }

        view()->share('languages', $languages);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
