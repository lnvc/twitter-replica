<?php

namespace App\Http\Controllers;

use App\Follower;
use App\Following;
use App\Profile;
use App\User;

class FollowingController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function follow($id)
    {
        // dd($id);
        $user = User::find(auth()->user()->id);
        $profile = Profile::find($user->current_profile);
        $following = new Following;
        $following->profile_id = $profile->id;
        $following->following_id = $id;
        $following->save();
        $following->refresh();
        // $profile->followings()->save($following);
        
        // $followed = Profile::find($id);
        $follower = new Follower;
        $follower->profile_id = $id;
        $follower->follower_id = $profile->id;
        $follower->save();
        $follower->refresh();
        // $followed->followers()->save($follower);

        // return redirect()->route('home');
        $following->refresh();
        $follower->refresh();
        return redirect('/' .$user->handle . '/followers');
    }

    public function unfollow($id) 
    {
        $user = User::find(auth()->user()->id);
        $profile = Profile::find($user->current_profile);
        $profile->followings()->where('profile_id', $profile->id)->where('following_id', $id)->delete();
        $profile->save();

        $follower = Profile::find($id);
        $follower->followers()->where('profile_id', $id)->where('follower_id', $profile->id)->delete();
        $follower->save();

        // return redirect()->route('home');
        $follower->refresh();
        return redirect('/' .$user->handle . '/following');

    }
}
