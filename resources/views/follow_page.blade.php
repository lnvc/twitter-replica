@extends('layouts.app')

@section('content')
{{-- insert vue component 'Follow' --}}
    <div>
        <Follow f="{{ $f }}"></Follow>
    </div>
@endsection