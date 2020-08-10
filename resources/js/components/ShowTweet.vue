<template>
    <div class="container-fluid border-bottom">
        <div class="row border-bottom pb-3">
            <div class="col col-sm-auto">
                <img :src="'../../../storage/images/back.png'" alt="" class="icons" >
            </div>
            <div class="col pt-1">
                <span class="font-weight-bold">Tweet</span>
            </div>
        </div>
        <div class="px-1 py-2">
            <div class="row pb-2">
                <!-- credentials -->
                <div class="col col-sm-auto pr-2">
                    <img :src="'../../../storage/pfp/' + tweet_owner.profile_pic" class="rounded-circle" style="width: 50px; height: 50px;" alt="">
                </div>
                <div class="col">
                    <div class="row">
                        <span class="font-weight-bold">{{ tweet_owner.name }}</span>
                    </div>
                    <div class="row">
                        <span class="dark-gray">{{ '@' + tweet_owner.handle }}</span>
                    </div>
                </div>
                <div class="col text-right">
                    <v-popover
                    offset="16"
                    >
                    <img :src="'../../../storage/images/dropdown.png'" style="width: 15px; height: 15px; cursor: pointer;" alt="">

                    <template slot="popover">
                        <!-- <div class="row">Unfollow</div>
                        <div class="row">Delete</div> -->
                        <dropdown-hover :can_delete="can_delete" :profile="profile" :follows="follows" :tweet="tweet.id" :tweet_owner="tweet_owner.id"></dropdown-hover>

                        <!-- <a v-close-popover>Close</a> -->
                    </template>
                    </v-popover>
                </div>
            </div>
            <div class="row">
                <!-- tweet -->
                <div class="container-fluid">
                    <div>{{ tweet.tweet }}</div>
                </div>
            </div>
            <div class="row container-fluid pl-0 pb-2 border-bottom m-0">
                <!-- date -->
                <span class="dark-gray"><small>{{ tweet.created_at }}</small></span>
            </div>
            <div class="row container-fluid border-bottom m-0 py-2">
                <!-- retweet/likes -->
                <div class="col col-sm-auto pl-0">
                    <span><b>{{ tweet.retweet_count }}</b> Retweets</span>
                </div>
                <div class="col col-sm-2">
                    <span><b>{{ tweet.favorite_count }}</b> Likes</span>
                </div>
            </div>
            <div class="row container-fluid text-center py-2">
                <!-- buttons -->
                <div class="col col-sm-3">
                    <b-button v-b-modal.modal-3 style="background: transparent" class="border-0">
                        <img :src="'../../../storage/images/reply.png'" style="width: 20px; height: 20px;" alt="">
                    </b-button>

                    <b-modal id="modal-3" hide-footer>
                        <make-tweet :profile="profile" :is_reply='true' :reply_to_tweet="tweet_owner.handle" ></make-tweet>
                    </b-modal>
                </div>
                
                <div class="col col-sm-3">
                    <img :src="'../../../storage/images/retweet.png'" style="width: 20px; height: 20px;" alt="">

                </div>
                <div class="col col-sm-3">
                    <img :src="'../../../storage/images/like.png'" style="width: 20px; height: 20px;" alt="">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'show-tweet',
    props: ["tweet_owner", "user", "tweet", "profile", "follows"],
    computed: {
        can_delete: function() {
            if(this.tweet_owner.handle == this.user.handle){
                return true;
            }
            return false;
        }
    }
}
</script>
