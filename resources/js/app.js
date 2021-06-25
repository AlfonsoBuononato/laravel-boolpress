
window.Vue = require('vue');

import App from './App.vue';

const root = new Vue({
    el:'#root',
    render: h => h(App)
}) 