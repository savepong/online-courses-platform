require('./bootstrap');
window.Vue = require('vue');


import Vue from 'vue'
import VueRouter from 'vue-router'

import IndexPage from './pages/IndexPage'
import ArticlesPage from './pages/ArticlesPage'
import PostShow from './components/post/Show'


Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('navigation-component', require('./components/NavigationComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);

Vue.use(VueRouter)


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '',
            name: 'courses.index',
            component: IndexPage,
        },
        {
            path: '/articles',
            name: 'articles.index',
            component: ArticlesPage,
        },
        {
            path: '/post/:slug',
            name: 'post.show',
            component: PostShow,
        },
    ],
});


const app = new Vue({
    el: '#app',
    components: {
        'index-page': IndexPage 
    },
    router,
});