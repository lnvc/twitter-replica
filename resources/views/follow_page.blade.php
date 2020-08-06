@extends('layouts.app')

@section('content')
{{-- insert vue component 'Follow' --}}
    <div>
        <Follow user="{{ $user }}" f="{{ $f }}" :following="{{$followings}}" :followers="{{$followers}}" :not_following="{{$not_following}}" ></Follow>
    </div>
@endsection