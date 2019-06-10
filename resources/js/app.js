require('./bootstrap');
window.Vue = require('vue');


import Vue from 'vue'
import VueRouter from 'vue-router'

import IndexPage from './pages/IndexPage'
// import ArticlesPage from './pages/ArticlesPage'


Vue.component('header-component', require('./components/HeaderComponent.vue').default);

Vue.use(VueRouter)


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '',
            name: 'courses.index',
            component: IndexPage,
        },
    ],
});


const app = new Vue({
    el: '#app',
    components: {
        'index-page': IndexPage 
    },
});