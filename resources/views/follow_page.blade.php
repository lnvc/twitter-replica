@extends('layouts.app')

@section('content')
{{-- insert vue component 'Follow' --}}
    <div>
        <Follow f="{{ $f }}" :following="{{$followings}}" :followers="{{$followers}}" ></Follow>
    </div>
@endsection