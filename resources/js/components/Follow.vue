<template>
    <div class="container-fluid">
        <div class="row">
            @username
        </div>
        <div class="row">
            <div class="col">
                <button 
                    v-for="tab in tabs"
                    v-bind:key="tab"
                    @click="currentTab = tab"
                >
                {{ tab }}
                </button>
            </div>
        </div>

        <component :is="computeCurrentTab" :f="this.f" :following="this.following" :followers="this.followers"></component>
    </div>
</template>

<script>
import './Followings.vue';
import './Followers.vue';

export default {
    name: 'Follow',
    props: ["f", "following", "followers"],
    data() {
        return {
            currentTab: this.f,
            tabs: ["Followers", "Following"],
        }
    },
    computed: {
        computeCurrentTab: function() {
            return 'tab-' + this.currentTab.toLowerCase();
        }
    }
}
</script>
