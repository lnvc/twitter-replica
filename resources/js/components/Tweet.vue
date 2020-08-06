<template>
    <div class="col text-right" @click="drop">
        <span>{{ this.test }}</span>
        <input type="image" :src="'../../../storage/images/dropdown.png'" alt="" style="height: 15px; width: 15px;">
    </div>
</template>

<script>
export default {
    name: 'tweet',
    // props: ["tweet"]
    data() {
        return {
            test: ''
        }
    },
    methods: {
        drop: function() {
            return this.test = 'test';
        }
    }
}
</script>