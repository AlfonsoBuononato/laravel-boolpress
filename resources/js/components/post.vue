<template>
    <div class="container">
        <ul v-for="post in post" :key="`id-${post.id}`">
            <li>titolo: {{post.title}}</li> 
            <li>Contenuto: {{post.content}}</li>
            <li><router-link :to="{name: 'post-detail', params:{slug: post.slug}}">Dettagli</router-link></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'post',
    props: [
        'post'
    ]
}
</script>

<style>

</style>