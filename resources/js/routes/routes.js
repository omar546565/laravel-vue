import Vue from "vue";
import Router from "vue-router"
Vue.use(Router)

import loginapp from '../auth/login'
import registerapp from '../auth/register'
import index from '../components/index.vue'
import notFound from '../components/notFound.vue'

const routes = [

    {
        path: '/',
        component:index
    },
    {
        path: '/loginapp',
        component:loginapp
    },
    {
        path: '/registerapp',
        component:registerapp
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
