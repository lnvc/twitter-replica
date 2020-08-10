<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use stdClass;

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
        $tweets = null;
        $profile = null;
        if(!auth()->check()){
            // guest
            $tweets = null; 
        }
        else if(User::find(auth()->user()->id)->profiles()->get()->isEmpty()){
            // first sign up
            $profile_first = new Profile;
            $profile_first->name = auth()->user()->name;
            $profile_first->handle = auth()->user()->handle;
            $profile_first->profile_pic = 'default.jpeg';
            $profile_first->cover = 'gray.jpeg';
            $user->profiles()->save($profile_first);
            $user->refresh();

            $user->current_profile = $profile_first->id;
            $user->save();
            $user->refresh();
            
            // appserviceprovider loads first before controllers, so manually assign profile upon user sign up
            return view('home', compact('profile_first', 'tweets'));
        }
        else{
            // old signed in user
            $profile = Profile::find(auth()->user()->current_profile);
            $follows = $profile->followings()->select('following_id')->get();
            $tweets = DB::table('tweets')->where('profile_id', auth()->user()->current_profile)->leftJoin('profiles', 'tweets.profile_id', '=', 'profiles.id')->select('profiles.name', 'profiles.handle', 'profiles.profile_pic', 'tweets.*')->get();
            $retweets = $profile->retweets()
                ->leftJoin('tweets', 'retweets.retweeted_tweet', 'tweets.id')
                ->leftJoin('profiles as RTER', 'retweets.profile_id', 'RTER.id')
                ->leftJoin('profiles', 'tweets.profile_id', 'profiles.id')
                ->select('*', 'RTER.handle as rter_handle', 'retweets.created_at', 'retweets.updated_at', 'retweets.profile_id', 'tweets.id')->get();
            // dd($tweets);
            if(!$retweets->isEmpty()){
                // dd($tweets->merge($retweets));
                $tweets = $tweets->merge($retweets);
                // dd($tweets);
            }
            foreach($follows as $follow) {
                $follow_profile = Profile::find($follow->following_id);
                if(!$follow_profile->tweets()->get()->isEmpty()){
                    $add_tweet = DB::table('tweets')->where('profile_id', $follow->following_id)->leftJoin('profiles', 'tweets.profile_id', '=', 'profiles.id')->select('profiles.*', 'tweets.*')->get();
                    $tweets = $tweets->merge($add_tweet);
                    // dd($add_tweet);
                    // dd($tweets);
                }
                $retweets = $follow_profile->retweets()
                    ->leftJoin('tweets', 'retweets.retweeted_tweet', 'tweets.id')
                    ->leftJoin('profiles as RTER', 'retweets.profile_id', 'RTER.id')
                    ->leftJoin('profiles', 'tweets.profile_id', 'profiles.id')
                    ->select('*', 'RTER.handle as rter_handle', 'retweets.created_at', 'retweets.updated_at', 'retweets.profile_id', 'tweets.id')->get();
                if(!$retweets->isEmpty()){
                    $tweets = $tweets->merge($retweets);
                    // dd($tweets);
                }
                // $tweets = DB::table('tweets')->leftJoin('profiles', 'tweets.profile_id', '=', 'profiles.id')->select('tweets.*', 'profiles.name', 'profiles.handle', 'profiles.profile_pic')->orderBy('created_at', 'desc')->get();
            }
            $tweets = $tweets->sortByDesc('created_at');

            // $tweets = DB::table('tweets')->leftJoin('profiles', 'tweets.profile_id', '=', 'profiles.id')->select('tweets.*', 'profiles.name', 'profiles.handle', 'profiles.profile_pic')->orderBy('created_at', 'desc')->get();

        }
        // dd($tweets);
        return view('home', compact('tweets'));
    }

    // public function follow()
    // {
    //     return view()
    // }

}
