/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import router from './routes';
require('vue2-animate/dist/vue2-animate.min.css')
Vue.component('post-header',require('./components/postHeader').default);
Vue.component('nav-bar',require('./components/navBar').default);
Vue.component('post-list',require('./components/PostList').default);
Vue.component('post-list-item',require('./components/PostListItem').default);
Vue.component('category-link',require('./components/CategoryLink').default);
Vue.component('tag-link',require('./components/tagLink').default);
Vue.component('post-link',require('./components/PostLink').default);
Vue.component('disqus-comments',require('./components/DisqusComments').default);
Vue.component('pagination-links',require('./components/PaginationLinks').default);
Vue.component('paginator',require('./components/Paginator').default);
Vue.component('social-links',require('./components/socialLinks').default);
Vue.component('contact-form',require('./components/contactForm').default);

const app= new Vue({
 el:'#app',
 router   
});


