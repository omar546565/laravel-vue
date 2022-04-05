import Vue from "vue";
import Router from "vue-router"
Vue.use(Router)

import loginapp from '../auth/login'
import registerapp from '../auth/register'

import index from '../components/index.vue'
import profile from '../auth/profile.vue'
import notFound from '../components/notFound.vue'

const routes = [

    {
        path: '/',
        component:index,
        name:'/',

    },

    {
        path: '/profile',
        component:profile
    },
    {
        path: '/loginapp',
        component:loginapp,
        name:'loginapp',

    },
    {
        path: '/registerapp',
        component:registerapp,
        name:'registerapp',

    },
    {
        path: '/:pathMatch(.*)*',
        component:notFound
    },

]


export  default  new Router({
    mode:'history',
    routes

})
