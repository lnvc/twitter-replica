<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // feed
        $user = User::find(auth()->user()->id);
        $tweets = '';
        if(User::find(auth()->user()->id)->profiles()->get()->isEmpty()){
            // first sign up
            $profile = new Profile;
            $profile->name = auth()->user()->name;
            $profile->handle = auth()->user()->handle;
            $profile->profile_pic = 'default.jpeg';
            $profile->cover = 'gray.jpeg';
            $user->profiles()->save($profile);

            $user->current_profile = $profile->id;
            $user->save();
        }
        else{
            $tweets = DB::table('tweets')->leftJoin('profiles', 'tweets.profile_id', '=', 'profiles.id')->select('tweets.*', 'profiles.name', 'profiles.handle', 'profiles.profile_pic')->orderBy('created_at', 'desc')->get();
            // if($tweets->isEmpty()){
            //     $tweets = [];
            // }
        }
        // dd($tweets);
        return view('home', compact('tweets'));
    }

    // public function follow()
    // {
    //     return view()
    // }

}
