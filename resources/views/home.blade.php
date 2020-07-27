@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
  <h4 class="pl-2 pb-2 border-bottom"><b>Home</b></h4>
  <div class="make-tweet">
    <Tweet :profile="{{$profile}}" :showModal="isOpen = 1" />
  </div>
  @if ($tweets)
    <div>
      @each('partials.tweet', $tweets, 'tweet')
    </div>
  @endif
</div>
@endsection
