<template>
    <div id="followers">
        <profile-partial v-for="(profile, index) in this.followers" :user="user" :key="profile.id" :index="index" :profile="profile" :f="f" :not_following="not_following"  ></profile-partial>
    </div>
</template>

<script>
import './ProfilePartial.vue'

export default {
    name: 'tab-followers',
    props: ["user", "f", "following", "followers", "not_following"],

}
</script>
