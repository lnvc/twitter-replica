<?php

namespace App\Http\Controllers;

use App\Like;
use App\Profile;
use App\Retweet;
use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $tweet = Tweet::find($request->input('liked_tweet'));
        $already_liked = DB::table('likes')->where('profile_id', $profile->id)->where('liked_tweet', $request->input('liked_tweet'))->get();

        if($already_liked->isEmpty()){
            // like
            $like = new Like;
            $like->profile_id = $profile->id;
            $like->liked_tweet = $request->input('liked_tweet');
            $like->save();
            $like->refresh();

            $tweet->favorite_count += 1;
            $tweet->save();
            $tweet->refresh();

            $profile->likes()->save($like);
        }
        else{
            // unlike
            $tweet->favorite_count -= 1;
            $tweet->save();
            $profile->likes()->where('liked_tweet', $request->input('liked_tweet'))->delete();
            $profile->save();
        }

        return redirect()->route('home');
    }
    
    public function retweet(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $profile = Profile::find($user->current_profile);
        $tweet = Tweet::find($request->input('retweeted_tweet'));
        $already_retweeted = DB::table('retweets')->where('profile_id', $profile->id)->where('retweeted_tweet', $request->input('retweeted_tweet'))->get();

        if($already_retweeted->isEmpty()){
            // retweet
            $retweet = new Retweet;
            $retweet->profile_id = $profile->id;
            $retweet->retweeted_tweet = $request->input('retweeted_tweet');
            $retweet->save();
            $retweet->refresh();

            $tweet->retweet_count += 1;
            $tweet->save();
            $tweet->refresh();

            $profile->retweets()->save($retweet);
        }
        else{
            // unretweet
            $tweet->retweet_count -= 1;
            $tweet->save();
            $profile->retweets()->where('retweeted_tweet', $request->input('retweeted_tweet'))->delete();
            $profile->save();
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user, $tweet_id)
    {
        $user = Profile::find(auth()->user()->current_profile);
        $tweet = Tweet::find($tweet_id);
        $tweet_owner = $tweet->profile()->first();
        // dd($tweet_owner, $user, $can_follow);
        return view('show_tweet', compact('tweet_owner', 'user', 'tweet'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find(auth()->user()->current_profile);
        
        $profile->tweets()->where('id', $id)->delete();
        $profile->retweets()->where('profile_id', auth()->user())->where('retweeted_tweet', $id)->delete();

        return redirect()->route('home');
    }
}
