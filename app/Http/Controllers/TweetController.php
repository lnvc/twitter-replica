<?php

namespace App\Http\Controllers;

use App\Like;
use App\Profile;
use App\Retweet;
use App\Tweet;
use App\User;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $profile = Profile::find($user->current_profile);
        $tweet = new Tweet;
        $tweet->tweet = $request->input('tweet');
        $tweet->favorite_count = 0;
        $tweet->retweet_count = 0;
        $tweet->reply_count = 0;
        $tweet->profile_id = $profile->id;
        $tweet->save();

        return redirect()->route('home');
    }

    public function like(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $profile = Profile::find($user->current_profile);
        $like = new Like;
        $like->profile_id = $profile->id;
        $like->liked_tweet = $request->input('liked_tweet');
        $like->save();

        return redirect()->route('home');
    }
    
    public function retweet(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $profile = Profile::find($user->current_profile);
        $retweet = new Retweet;
        $retweet->profile_id = $profile->id;
        $retweet->retweeted_tweet = $request->input('retweeted_tweet');
        $retweet->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
