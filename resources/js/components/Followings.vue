<template>
    <div id="following">
        <profile-partial v-for="(profile, index) in this.following" :user="user" :key="profile.id" :index="index" :profile="profile" :not_following="not_following" :f="f"></profile-partial>
    </div>
</template>

<script>
import './ProfilePartial.vue';

export default {
    name: 'tab-following',   
    props: ["user", "f", "following", "followers", "not_following"],
}
</script>
