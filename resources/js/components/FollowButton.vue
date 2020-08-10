<template>
    <div v-if="(this.not_following && this.not_following.indexOf(this.profile.id) > -1) || this.can_follow">
        <form method="GET" :action="'/follow/' + this.profile.id">
            <input type="hidden" name="_token" :value="csrf">
            <input type="submit" class="btn btn-secondary" value="Follow">
        </form>
        <!-- <button class="btn btn-primary">Follow</button> -->
    </div>
    <!-- <div v-else-if="this.can_follow">
        <form method="GET" :action="'/follow/' + this.profile.id">
            <input type="hidden" name="_token" :value="csrf">
            <input type="submit" class="btn btn-secondary" value="Follow">
        </form>
        <button class="btn btn-primary">Follow</button>
    </div> -->
    <div v-else>
        <form method="GET" :action="'/unfollow/' + this.profile.id">
            <input type="hidden" name="_token" :value="csrf">
            <input @mouseover="status = 'Unfollow'" @mouseout="status = 'Following'" type="submit" :class="{'btn btn-primary' : status == 'Following', 'btn btn-danger' : status == 'Unfollow'}" :value="status">
        </form>
        <!-- <button class="btn btn-primary">Following</button> -->
    </div>
</template>

<script>
export default {
    name: 'follow-button',
    props: ["profile", "can_follow", "not_following"],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            profile_state: this.profile,
            status: 'Following',
        }
    },
    methods: {
        // hover: function() {
        //     this.status = 
        // }
    }
}
</script>
