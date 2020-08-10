@if (isset($tweet->id)) 
<div id="{{ $tweet->id . $tweet->profile_id }}" class="container-fluid border-bottom py-2 tweet-container" style="min-width: 100%; cursor: pointer;">
    {{-- if retweeted tweet is not deleted --}}
        @if (isset($tweet->retweeted_tweet))
            <div class="row" onclick="location.href='{{ '/' . $tweet->handle . '/status' .'/' . $tweet->id }}';">
                <div class="col col-sm-1 text-right pr-0">
                    <img src="images/retweet.png" style="height: 10px; width: 10px;" alt="">
                </div>
                <div class="col col-sm-auto pr-0">
                    @if($tweet->rter_handle != $profile->handle)
                        <a href="{{ '/' . $tweet->rter_handle }}" class="text-secondary">
                            <span>{{ $tweet->rter_handle }} Retweeted</span>
                        </a>
                    @else 
                        <a href="{{ '/' . $tweet->rter_handle }}" class="text-secondary">
                            <span>You Retweeted</span>
                        </a>
                    @endif
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col col-md-auto px-2 pt-2" onclick="location.href='{{ '/' . $tweet->handle . '/status' .'/' . $tweet->id }}';">
                <a href="{{ '/' . $tweet->handle }}">
                    <img src="{{ asset('storage/pfp/' . $tweet->profile_pic) }}" class="rounded-circle" style="height:50px;width:50px" alt="">
                </a>
            </div>
            
            <div class="col col-md-auto px-2" style="width: 85%" >
                <span class="row" >
                    <div class="col col-md-11 px-2" onclick="location.href='{{ '/' . $tweet->handle . '/status' .'/' . $tweet->id }}';">
                        <a href="{{ '/' . $tweet->handle }}">
                            <span style="color: black"><b>{{ $tweet->name }}</b></span>
                            <span class="text-secondary">{{ '@'.$tweet->handle }}</span>
                        </a>
                        <span class="text-secondary">{{' · ' . $tweet->created_at}}</span>
                    </div>
                    <div class="col text-right" onclick="">
                        <v-popover
                        offset="16"
                        >
                        <img src="{{ asset('storage/images/dropdown.png') }}" style="width: 15px; height: 15px; cursor: pointer;" alt="">

                        <template slot="popover">
                            <!-- <div class="row">Unfollow</div>
                            <div class="row">Delete</div> -->
                            @if ($profile->id == $tweet->profile_id)
                                <dropdown-hover :can_delete='true' :follows="{{ $follows }}" :profile="{{ $profile }}" :tweet="{{ $tweet->id }}" :tweet_owner="{{ $tweet->profile_id }}"></dropdown-hover>
                            @else 
                                <dropdown-hover :can_delete='false' :follows="{{ $follows }}" :profile="{{ $profile }}" :tweet="{{ $tweet->id }}" :tweet_owner="{{ $tweet->profile_id }}"></dropdown-hover>
                            @endif
                            {{-- <dropdown-hover></dropdown-hover> --}}

                            <!-- <a v-close-popover>Close</a> -->
                        </template>
                        </v-popover>
                        {{-- <input type="image" src="{{ asset('images/dropdown.png') }}" alt="" style="height: 15px; width: 15px;"> --}}
                    </div>
                    {{-- <Tweet></Tweet> --}}
                </span>
                <div class="row pl-2" style="width: 100%" onclick="location.href='{{ '/' . $tweet->handle . '/status' .'/' . $tweet->id }}';">
                    <span>{{ $tweet->tweet }}</span> 
                </div>
                <div class="row" onclick="location.href='{{ '/' . $tweet->handle . '/status' .'/' . $tweet->id }}';">
                    <div class="col col-md-4 pl-2">
                        <img src="{{ asset('images/reply.png') }}" alt="" style="height:15px;width:15px;" >
                    </div>
                    <form method="POST" action="/retweet" class="col col-md-4 pl-2">
                        @csrf
                        <input type="hidden" name="retweeted_tweet" id="retweeted_tweet" value="{{ $tweet->id }}">
                        <input type="image" src="{{ asset('images/retweet.png') }}" alt="" style="height:15px;width:15px;" >
                    </form>
                    <form method="POST" action="/like" class="col col-md-4 pl-2">
                        @csrf
                        <input type="hidden" value="{{ $tweet->id }}" id="liked_tweet" name="liked_tweet">
                        <input type="image" src="{{ asset('images/like.png') }}" alt="" style="height:15px;width:15px;" >
                    </form>
                </div>
            </div>
        </div>
</div>
@endif