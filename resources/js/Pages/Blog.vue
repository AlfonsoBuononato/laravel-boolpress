<template>
        <div class="container">
            <post :post="posts"/>
            <button @click="getPost(paginate.pageCurrent - 1)" v-show="paginate.pageCurrent > 1">prev</button>
            <button @click="getPost(paginate.pageCurrent + 1)" v-show="paginate.pageCurrent < paginate.lastPage">next</button>
        </div>
</template>

<script>
import axios from 'axios';
import post from '../components/post.vue'
export default {
    name: 'blog',
    components: {
        post
    },
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