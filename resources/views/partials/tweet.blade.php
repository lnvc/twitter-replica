<div class="container-fluid border border-top-0 py-2" style="min-width: 100%;">
    <div class="row">
        <div class="col col-md-auto pl-1 pt-2">
            <a href="{{ '/' . $tweet->handle }}">
                <img src="{{ asset('storage/pfp/' . $tweet->profile_pic) }}" class="rounded-circle" style="height:50px;width:50px" alt="">
            </a>
        </div>
        
        <div class="col col-md-auto p-0" style="width: 80%">
            <span class="row">
                <div class="col col-md-auto px-2">
                    <a href="{{ '/' . $tweet->handle }}">
                        <span style="color: black"><b>{{ $tweet->name }}</b></span>
                        <span class="text-secondary">{{ '@'.$tweet->handle }}</span>
                    </a>
                    <span class="text-secondary">{{' · ' . $tweet->created_at}}</span>
                </div>
            </span>
            <div class="row pl-2" style="width: 100%">
                <span>{{ $tweet->tweet }}</span> 
            </div>
            <div class="row">
                <div class="col col-md-4 pl-2">
                    <img src="{{ asset('images/reply.png') }}" alt="" style="height:15px;width:15px;" >
                </div>
                <div class="col col-md-4 pl-2">
                    <img src="{{ asset('images/retweet.png') }}" alt="" style="height:15px;width:15px;" >
                </div>
                <div class="col col-md-4 pl-2">
                    <img src="{{ asset('images/like.png') }}" alt="" style="height:15px;width:15px;" >
                </div>
            </div>
        </div>
    </div>
</div>