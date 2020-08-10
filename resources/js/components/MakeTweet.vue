<template>
    <div class="container-fluid px-0 py-0">
        <form action="/tweet" enctype="multipart/form-data" method="POST" class="border-bottom">
            <input type="hidden" name="_token" :value="csrf">
            <div class="row container-fluid py-2">
                <div class="col col-md-auto px-2 pt-2">
                    <img :src="'../../../storage/pfp/' + profile.profile_pic" class="rounded-circle" style="height:50px;width:50px" alt="">
                </div>
                <div class="form-group col col-md-auto px-2" style="width: 85%;">
                    <input v-model="tweet" id="rep" type="text" name="tweet" style="border: transparent; outline: none; width: 100%;" placeholder="What's happening?" v-on:keyup="countChars">
                </div>
            </div>
            <div class="text-right px-2 py-2">
                <button type="submit" class="btn btn-primary rounded" :disabled="disabled == 1">Tweet</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "make-tweet",
        props: ["profile", "is_reply", "reply_to_tweet"],
        mounted: function() {
            console.log(this.reply_to_tweet);
            if(this.is_reply){
                document.getElementById("rep").value = '@' + this.reply_to_tweet + ' ';
            }
        },
        methods: {
            countChars() {
                if(this.tweet.length <= 250 && this.tweet.length > 0){
                    console.log(this.tweet.length);
                    this.disabled = 0;
                }
                else{
                    this.disabled = 1;
                }
            },
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                disabled: 1,
            }
        }
    }
</script>

