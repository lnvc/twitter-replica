<template>
    <div>
        <ul class="nav">
            <div v-if="can_delete">
                <!-- <a class="dropdown-item" href="#">Delete</a> -->
                <li class="nav-item">
                    <form :action="'/delete/' + tweet" method="POST">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="_method" value="delete" />

                        <input type="submit" name="" id="" value="Delete" class="nav-link border-0">

                    </form>
                </li>
            </div>
            <div v-if="can_follow == 'true'">
                <li class="nav-item">
                    <form :action="'/follow/' + tweet_owner" method="GET">
                        <input type="hidden" name="_token" :value="csrf">

                        <input type="submit" name="" id="" value="Follow" class="nav-link border-0">

                    </form>
                </li>
            </div>
            <div v-else-if="can_follow == 'false'">
                <li class="nav-item">
                    <form :action="'/unfollow/' + tweet_owner" method="GET">
                        <input type="hidden" name="_token" :value="csrf">

                        <input type="submit" name="" id="" value="Unfollow" class="nav-link border-0">

                    </form>
                </li>
            </div>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'dropdown-hover',
    props: ["can_delete", "profile", "follows", "tweet", "tweet_owner"],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    computed: {
        can_follow: function() {
            if(this.can_delete){
                return 'same_user';
            }
            else if(this.follows.some(el => el.following_id === this.tweet_owner)){
                return 'false';
            }
            return 'true';
        }
    }
}
</script>
