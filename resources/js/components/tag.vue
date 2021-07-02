<template>
    <div>
        <span v-for="item in tag" :key="`${item.id}`">{{item.name}} </span>
    </div>
</template>

<script>
export default {
    name: 'tag',
    props: [
        'tag'
    ]
}
</script>

<style>

</style>