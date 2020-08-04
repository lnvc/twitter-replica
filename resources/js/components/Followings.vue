<template>
    <div id="following">
        <profile-partial v-for="(profile, index) in this.following" :key="profile.id" :index="index" :profile="profile"></profile-partial>
    </div>
</template>

<script>
import './ProfilePartial.vue';

export default {
    name: 'tab-following',   
    props: ["f", "following", "followers"],
}
</script>
