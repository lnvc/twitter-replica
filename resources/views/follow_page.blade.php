@extends('layouts.app')

@section('content')
{{-- insert vue component 'Follow' --}}
    <div>
        <Follow user="{{ $user }}" f="{{ $f }}" :following="{{$followings}}" :followers="{{$followers}}" ></Follow>
    </div>
@endsection