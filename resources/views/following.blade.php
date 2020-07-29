@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($followings as $following)
        {{ $following->handle }}
    @endforeach
</div>
@endsection