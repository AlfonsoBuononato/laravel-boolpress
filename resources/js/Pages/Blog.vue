<template>
        <div class="container">           
            <ul v-for="post in posts" :key="`id-${post.id}`">
               <li>titolo: {{post.title}}</li> 
               <li>Contenuto: {{post.content}}</li>
               <li><router-link :to="{name: 'post-detail', params:{slug: post.slug}}">Dettagli</router-link></li>
            </ul>
            <button @click="getPost(paginate.pageCurrent - 1)" v-show="paginate.pageCurrent > 1">prev</button>
            <button @click="getPost(paginate.pageCurrent + 1)" v-show="paginate.pageCurrent < paginate.lastPage">next</button>
            <a href="/admin">log in</a>
        </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'blog',
    data(){
        return{
            posts: [],
            paginate: {},
        }
    },
    created(){
        this.getPost();
    },
    methods:{
        getPost(page){
            axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
            .then((res) => {
                this.posts = res.data.posts.data;
                this.paginate = {
                    pageCurrent : res.data.posts.current_page,
                    lastPage : res.data.posts.last_page
                }
            })
            .catch((err) => {
                console.log(err);
            })
        },
    }
}
</script>

<style>

</style>