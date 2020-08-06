<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-auto" @click="laravelRoute" style="cursor: pointer">
                <span><img :src="'../../../storage/images/back.png'" class="icons" alt=""></span>
            </div>
            <div class="col" style="color: gray;">@{{ this.user }}</div>
        </div>
        <div class="row row-tabs">
            <div class="col col-md-6 text-center py-3"
                v-for="tab in tabs"
                v-bind:key="tab"
                @click="currentTab = tab"
                v-bind:class="{active: checkActive(tab), tabs}"
            >
                <b>{{ tab }}</b>
            </div>
        </div>
        <component :is="computeCurrentTab" :f="this.f" :following="this.following" :followers="this.followers" :not_following="this.not_following" ></component>
    </div>
</template>

<script>
import './Followings.vue';
import './Followers.vue';

export default {
    name: 'Follow',
    props: ["user", "f", "following", "followers", "not_following"],
    data() {
        return {
            currentTab: this.f,
            tabs: ["Followers", "Following"],
        }
    },
    computed: {
        computeCurrentTab: function() {
            return 'tab-' + this.currentTab.toLowerCase();
        },
    },
    methods: {
        checkActive: function(tab) {
            if(tab.toLowerCase() == this.currentTab.toLowerCase()){
                return true;
            }
            else {
                return false;
            }
        },
        laravelRoute: function() {
            window.location.href = '/' + this.user;
        }
    }
}
</script>

