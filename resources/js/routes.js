import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

export default new Router({
    routes:[
        {
            path:'/',
            name:'home',
            component:require('./views/Home').default
        },
        {
            path:'/about',
            name:'about',
            component:require('./views/About').default
        },
        {
            path:'/archive',
            name:'archive',
            component:require('./views/Archive').default
        },
        {
            path:'/contact',
            name:'contact',
            component:require('./views/Contact').default
        },
        {
            path:'/blog/:url',
            name:'post_show',
            component:require('./views/PostsShow').default,
            props:true
        },
        {
            path:'/categories/:category',
            name:'category_posts',
            component:require('./views/categoryPosts').default,
            props:true
        },
        {
            path:'/tags/:tag',
            name:'tags_posts',
            component:require('./views/TagsPosts').default,
            props:true
        },
        {
            path:'*',
            component:require('./views/404').default
        }
    ],
    linkExactActiveClass:'active',
    mode: 'history',
    scrollBehavior(){
        return {
            x:0,
            y:0
        }
    }
});