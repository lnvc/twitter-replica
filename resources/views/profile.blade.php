@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <nav class="nav flex-column position-relative">
        {{-- cover and icon --}}
        <a class="nav-link" id="cover-profile">
            
            <img src="{{ asset('storage/cover/'.$is_user->cover) }}" id="cover" alt="">
            
            <img src="{{ asset('storage/pfp/'.$is_user->profile_pic) }}" id="profile_pic" class="rounded-circle" alt="">
        </a>
        <div class="position-absolute" style="right: 0; bottom: 40px;">
            @if(!$is_own_profile && $can_follow)
                <a href="{{ url('follow/' . $is_user->id) }}" class="btn btn-primary">Follow</a>
            @elseif(!$is_own_profile && !$can_follow)
                <a href="{{ url('unfollow/' . $is_user->id) }}" class="btn btn-danger">Unfollow</a>
            @else
                <a href="/settings/profile" class="btn btn-primary" >Edit profile</a>
            @endif
        </div>
    </nav>
    {{ '@'.$user }}
    
    <br>
    <p>{{ sizeof($followings) }} Following</p>

    <p>{{ sizeof($followers) }} Followers</p>

    <br>
    <div>
        @each('partials.tweet', $tweets, 'tweet')
    </div>
</div>
@endsection