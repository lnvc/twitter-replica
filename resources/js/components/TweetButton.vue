<template>
    <div id="tweet-button">
        <div v-if="isOpen">
            <div class="overlay" @click.self="isOpen = false">
                <div class="modal">
                    <Tweet :profile="profile" />
                </div>
            </div>
        </div>
        <button @click="isOpen = !isOpen" class="btn btn-primary">Tweet</button>
    </div>
</template>

<script>
import Tweet from './Tweet.vue';

export default {
    name: "TweetButton",
    props: ["profile"],
    data() {
        return {
            isOpen: false,
        }
    },
    components: {
        Tweet,
    }
}
</script>

<style scoped>
    .modal-1 {
        width: 100%;
        height: 100%;
        justify-content: center;
        top: 0;
        left: 0;
    }

    .overlay {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: flex;
        z-index: 999;
        background: lightslategrey;
        opacity: 0.2;
    }
</style>