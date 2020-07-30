<?php

namespace App\Providers;

use App\Profile;
use App\User;
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
            // if(auth()->check() && User::find(auth()->user()->id)->profiles()->get()->isEmpty()){
            //     // first sign up
            //     $user = User::find(auth()->user()->id);
            //     $profile = new Profile;
            //     $profile->name = auth()->user()->name;
            //     $profile->handle = auth()->user()->handle;
            //     $profile->profile_pic = 'default.jpeg';
            //     $profile->cover = 'gray.jpeg';
            //     $user->profiles()->save($profile);
    
            //     $user->current_profile = $profile->id;
            //     $user->save();
            //     $user->refresh();
            //     // dd($profile);
            // }
             if(auth()->check()){
                // old user
                $profile = Profile::find(auth()->user()->current_profile);
            }

            // all views get 'profile' = $profile
            $view->with('profile', $profile);
        });
    }
}