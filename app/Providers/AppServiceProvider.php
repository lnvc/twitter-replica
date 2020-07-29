<?php

namespace App\Providers;

use App\Profile;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $profile = null;
            if(auth()->check()){
                $profile = Profile::find(auth()->user()->current_profile);
            }

            // all views get 'profile' = $profile
            $view->with('profile', $profile);
        });
    }
}