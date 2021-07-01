<template>
    <header>
        <router-link :to="{name:'home'}">Home</router-link>
        <router-link :to="{name:'About'}">About</router-link>
        <router-link :to="{name:'blog'}">Blog</router-link>
    </header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style>

</style>