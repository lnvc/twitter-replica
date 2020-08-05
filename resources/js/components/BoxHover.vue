<template>
    <div class="container-fluid">
        {{profile.handle}}
    </div>
</template>

<script>
export default {
    name: 'box-hover',
    props: ["profile"],
}
</script>