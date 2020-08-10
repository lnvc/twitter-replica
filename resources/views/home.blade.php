@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
  <h4 class="pl-2 pb-2 border-bottom"><b>Home</b></h4>
  <div class="make-tweet">
    @if ($profile)
      <make-tweet :is_reply='false' :profile="{{$profile}}" :showModal="isOpen = 1"></make-tweet>
    @else
      <make-tweet :is_reply='false' :profile="{{$profile_first}}" :showModal="isOpen = 1"></make-tweet>
    @endif
  </div>
  @if ($tweets)
    <div>
      @each('partials.tweet', $tweets, 'tweet')
    </div>
  @endif
</div>
@endsection
