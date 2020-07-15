@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data" action="/updateprofile">
            @csrf
            @method('PUT')
            <nav class="nav flex-column">
                {{-- cover and icon --}}
                <a class="nav-link" id="cover-profile">
                    <div class="wrapper" id="cover_up">
                        <label for="cover_btn">
                            <img src="{{ asset('images/upload.png') }}" id="cover_img" alt="">
                        </label>

                        <input type="file" name="cover" id="cover_btn">
                    </div>
                    <img src="{{ asset('storage/cover/' . $profile->cover) }}" id="cover" alt="">
                    <div class="wrapper" id="profile_up">
                        <label for="profile_pic_btn">
                            <img src="{{ asset('images/upload.png') }}" id="profile_img" alt="">
                        </label>
                        <input type="file" name="profile_pic" id="profile_pic_btn">
                    </div>
                    <img src="{{ asset('storage/pfp/' . $profile->profile_pic) }}" id="profile_pic" class="rounded-circle" alt="">
                </a>

                {{-- <div class="container-fluid"> --}}
                <a class="nav-link">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $profile->name }}">
                </a>
                <a class="nav-link">
                    <label for="bio">Bio</label>
                    <input type="text" name="bio" id="bio" value="{{ $profile->bio }}" placeholder="Add your bio">
                </a>
                <a class="nav-link">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" value="{{ $profile->location }}" placeholder="Add your location">
                </a>
                <a class="nav-link">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" value="{{ $profile->website }}" placeholder="Add your website">
                </a>
                <a class="nav-link">
                    <label for="birthday">Birth date</label>
                    <input type="date" name="birthday" id="birthday" value="{{ $profile->birthday }}">
                </a>
                <a class="nav-link">
                    <input type="submit" class="btn btn-primary" value="Save">
                </a>
                {{-- </div> --}}
            </nav>
        </form>
    </div>
@endsection