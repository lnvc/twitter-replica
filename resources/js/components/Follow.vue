<template>
    <div>
        <button 
            v-for="tab in tabs"
            v-bind:key="tab"
            @click="currentTab = tab"
        >
        {{ tab }}
        </button>

        <component :is="computeCurrentTab"></component>
    </div>
</template>

<script>
import './Followings.vue';
import './Followers.vue';

export default {
    name: 'Follow',
    props: ["f"],
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
