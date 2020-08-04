<template>
    <div class="row border-bottom py-3">
        <div class="col col-sm-auto pl-3 pr-2">
            <a :href="profile.handle"><img :src="'../../../storage/pfp/' + profile.profile_pic" class="rounded-circle" style="height:50px;width:50px" alt=""></a>
        </div>
        <div class="col">
            <div class="row">
                <b>{{ profile.name }}</b>
            </div>
            <div class="row dark-gray">
                <span>@{{ profile.handle }}</span>
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
