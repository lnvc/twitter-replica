@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <nav class="nav flex-column position-relative">
        {{-- cover and icon --}}
        <a class="nav-link px-0" id="cover-profile">
            
            <img src="{{ asset('storage/cover/'.$is_user->cover) }}" id="cover" alt="">
            
            <img src="{{ asset('storage/pfp/'.$is_user->profile_pic) }}" id="profile_pic" class="rounded-circle" alt="">
        </a>
        <div class="position-absolute px-3" style="right: 0; bottom: 40px;">
            @if(!$is_own_profile && $can_follow)
                <a href="{{ url('follow/' . $is_user->id) }}" class="btn btn-primary">Follow</a>
            @elseif(!$is_own_profile && !$can_follow)
                <a href="{{ url('unfollow/' . $is_user->id) }}" class="btn btn-danger">Unfollow</a>
            @else
                <a href="/settings/profile" class="btn btn-primary" >Edit profile</a>
            @endif
        </div>
    </nav>
    <div class="col">
        <div class="row px-3">
            <span><b>{{ $is_user->name }}</b></span>
        </div>
        <div class="row px-3">
            <span style="color: gray; font-size: 14px;">{{ '@'.$user }}</span>
        </div>
        <div class="row px-3 py-2">
            <span>
                {{ $is_user->bio }}
            </span>
        </div>
        <div class="row">
            @if ($is_user->location)
                <div class="col col-sm-auto">
                    <span>{{ $is_user->location }}</span>
                </div>
            @endif
            @if ($is_user->website)
                <div class="col col-sm-auto">
                    <a href="{{ $is_user->website }}">{{ $is_user->website }}</a>
                </div>
            @endif
            <div class="col">
                <span>{{ $is_user->created_at }}</span>
            </div>
        </div>
        <div class="row py-1">
            <div class="col col-sm-auto">
                <a href="{{ '/' . $is_user->handle . "/following" }}"><b style="color: black;">{{ sizeof($followings) }}</b> <span style="color: gray;"> Following </span></a>
            </div>
            <div class="col">
                <a href="#"><b style="color: black;">{{ sizeof($followers) }}</b> <span style="color: gray;"> Followers </span></a>
            </div>
        </div>
        <div class="row border-bottom py-3">
            <div class="col col-sm-2 text-center">
                <span>Tweets</span>
            </div>
            <div class="col col-sm-4 text-center">
                <span>Tweets & replies</span>
            </div>
            <div class="col col-sm-3 text-center">
                <span>Media</span>
            </div>
            <div class="col col-sm-3 text-center">
                <span>Likes</span>
            </div>
        </div>
    </div>    
    
    <div>
        @each('partials.tweet', $tweets, 'tweet')
    </div>
</div>
@endsection