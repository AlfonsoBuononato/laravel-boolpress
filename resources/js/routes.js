//DIPENDENZE
import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './Pages/Home.vue';
import Blog from './Pages/Blog.vue';
import About from './Pages/About.vue';
import NotFound from './Pages/NotFound.vue';
import PostDetail from './Pages/PostDetail.vue';
//ATTIVAZIONE
Vue.use(VueRouter);


const router = new VueRouter({
    mode : 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/about',
            name: 'About',
            component: About
        },
        {
            path: '/blog/:slug',
            name: 'post-detail',
            component: PostDetail
        },
        {
            path: '*',
            component: NotFound 
        }
    ]
});


export default router;