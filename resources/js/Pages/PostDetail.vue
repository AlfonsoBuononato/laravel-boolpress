<template>
    <div class="container">
        <div v-if="posts">
            <h1>Dettagli</h1>
            <ul>
                <li>{{posts.title}}</li>
                <li>{{posts.content}}</li>
                <li v-if="posts.category">{{posts.category.name}}</li>
                <li v-if="posts.tags">
                    <tag :tag="posts.tags" />
                </li>
            </ul>
        </div>
        <div v-else>
            <h4>loading</h4>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import tag from '../components/tag.vue'
export default {
    name: 'PostDetail',
    components:{
        tag
    },
    data(){
        return {
            posts: null
        }
    },
    created(){
        this.getPostDetails()
    },
    methods: {
        getPostDetails() {
            axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
            .then(res =>{
                this.posts = res.data;
            }).catch(err => {
                console.log(err);
            })
        }
    }
}
</script>

<style>

</style>