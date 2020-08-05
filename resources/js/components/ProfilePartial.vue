<template>
    <div class="row border-bottom py-3 tweet-container" @click="laravelRoute">
        <div class="col col-sm-auto pl-3 pr-2">
            <v-popover trigger="hover">
                <img :src="'../../../storage/pfp/' + profile.profile_pic" class="rounded-circle" style="height:50px;width:50px" alt="">
                <template slot="popover">
                    <box-hover :profile="profile"></box-hover>
                </template>
            </v-popover>
        </div>
        <div class="col">
            <div class="row">
                <b>{{ profile.name }}</b>
            </div>
            <div class="row dark-gray">
                <span>@{{ profile.handle }}</span>
            </div>
            <div class="row">
                <span>{{ profile.bio }}</span>
            </div>
        </div>
    </div>
</template>

<script>
import './BoxHover.vue'

export default {
    name: 'profile-partial',
    props: ["profile"],
    data() {
        return {
            hover: false,
        }
    },
    methods: {
        laravelRoute: function() {
            window.location.href =  '/' + this.profile.handle;
        }
    },
}
</script>
