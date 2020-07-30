<template>
    <div class="row">
        <div class="col col-sm-auto px-0">
            <a :href="profile.handle"><img :src="'../../../storage/pfp/' + profile.profile_pic" class="rounded-circle" style="height:50px;width:50px" alt=""></a>
        </div>
        <div class="col">
            <div class="row">
                <a href="#"><b>{{ profile.name }}</b></a>
            </div>
            <div class="row">
                <a href="#"><span>@{{ profile.handle }}</span></a>
            </div>
            <div class="row">
                <span>{{ profile.bio }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'profile-partial',
    props: ["profile"],

}
</script>
