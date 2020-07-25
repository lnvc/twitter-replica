<template>
    <div class="container-fluid px-0 py-0">
        <form action="/tweet" enctype="multipart/form-data" method="POST" class="border-bottom">
            <input type="hidden" name="_token" :value="csrf">
            <div class="row container-fluid py-2">
                <div class="col col-md-auto px-2 pt-2">
                    <a :href="profile.handle"><img :src="'../../../storage/pfp/' + profile.profile_pic" class="rounded-circle" style="height:50px;width:50px" alt=""></a>
                </div>
                <div class="form-group col col-md-auto px-2" style="width: 85%;">
                    <input type="text" v-model="tweet" id="tweet" name="tweet" style="border: transparent; outline: none; width: 100%;" placeholder="What's happening?" v-on:keyup="countChars">
                </div>
            </div>
            <div class="text-right px-2 py-2">
                <button type="submit" class="btn btn-primary rounded">Tweet</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Tweet",
        props: ["profile"],
        methods: {
            countChars() {
                if(this.tweet.length <= 250){
                    console.log(this.tweet.length);
                }
                else{

                }
            }
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    }
</script>
