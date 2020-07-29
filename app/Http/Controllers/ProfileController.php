<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class ProfileController extends Controller
{
    public function index($user)
    {
        $is_user = Profile::where('handle', $user)->get()->first();
        $is_own_profile = TRUE;
        $can_follow = FALSE;
        if(is_object($is_user)){
            if(Auth::check()){
                // user's profile
                $id = auth()->user()->current_profile;
                $is_own_profile = TRUE;
                $can_follow = FALSE;
                if($is_user->id != $id){
                    // visiting another profile
                    $is_own_profile = FALSE;
                    $can_follow = TRUE;
                    if(!Profile::find($id)->followings()->get()->isEmpty() && is_object(Profile::find($id)->followings()->where('following_id', $is_user->id)->first())){
                        $can_follow = FALSE;
                    }
                    $id = $is_user->id;
                }
            }
            else{
                // guest
                $id = $is_user->id;
                $is_own_profile = FALSE;
                $can_follow = FALSE;
            }
            $followers = Profile::find($is_user->id)->followers()->get();
            $followings = Profile::find($is_user->id)->followings()->get();
            $tweets = DB::table('tweets')->where('profile_id', $id)
                ->leftJoin('profiles', 'tweets.profile_id', 'profiles.id')
                ->select('tweets.*', 'profiles.name', 'profiles.handle', 'profiles.profile_pic')
                ->orderBy('created_at', 'desc')->get();
            // dd(storage_path('app/pfp/'.$is_user->profile_pic));
            $retweets = Profile::find($id)->retweets()
                ->leftJoin('tweets', 'retweets.retweeted_tweet', 'tweets.id')
                ->leftJoin('profiles', 'tweets.profile_id', 'profiles.id')
                ->select('*', 'tweets.id', 'retweets.created_at', 'retweets.updated_at', 'retweets.profile_id')->get();
            $tweets = $tweets->merge($retweets)->sortByDesc('created_at');
            // $profile = null;
            // if(auth()->check()){
            //     $profile = Profile::find(auth()->user()->current_profile);
            // }
            // dd($tweets);
            return view('profile', compact('user', 'id', 'is_own_profile', 'can_follow', 'followings', 'followers', 'is_user', 'tweets'));
        }
        return 'invalid user';
    }

    public function edit()
    {
        $profile = Profile::where('id', auth()->user()->current_profile)->first();
        // dd($profile->handle);
        return view('edit_profile', compact('profile'));
    }

    public function update(Request $request){
        $request->validate([
            'cover' => 'image|nullable',
            'profile_pic' => 'image|nullable',
            'name' => 'string|min:1',
            'bio' => 'string|max:255|nullable',
            'location' => 'string|max:255|nullable',
            'website' => 'url|nullable',
            'birthday' => 'date|nullable',
        ]);
        $profile = Profile::where('id', auth()->user()->id)->first();
        $profile->name = $request->input('name');
        $profile->bio = $request->input('bio');
        $profile->location = $request->input('location');
        $profile->website = $request->input('website');
        $profile->birthday = $request->input('birthday');
        
        if($request->hasFile('profile_pic')){
            $handle = auth()->user()->handle;
            $created_at = time();
            $file_name = $handle . '_pfp_' . $created_at;
            $profile->profile_pic = $file_name;
            $request->file('profile_pic')->storeAs('public/pfp', $file_name);
        }
        if($request->hasFile('cover')){
            $handle = auth()->user()->handle;
            $created_at = time();
            $file_name = $handle . '_cover_' . $created_at;
            $profile->cover = $file_name;
            $request->file('cover')->storeAs('public/cover', $file_name);
        }

        $profile->save();

        return redirect(url(auth()->user()->handle));
    }

    public function displayfollow($user)
    {
        $profile = Profile::where('handle', $user)->first();
        // follows
        $follows = $profile->followings()->get();
        $followings = [];
        foreach($follows as $follow){
            array_push($followings, Profile::find($follow->following_id));
        }

        // followers
        $follows = $profile->followers()->get();
        $followers = [];
        foreach($follows as $follow){
            array_push($followers, Profile::find($follow->following_id));
        }
        return view('following', compact('profile', 'followings', 'followers'));
    }
}
