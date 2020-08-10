@extends('layouts.app')

@section('content')
    <show-tweet :tweet_owner="{{ $tweet_owner }}" :user="{{ $user }}" :tweet="{{ $tweet }}" :follows="{{ $follows }}" :profile="{{ $profile }}"></show-tweet>
@endsection