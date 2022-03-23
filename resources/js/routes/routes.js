import Vue from "vue";
import Router from "vue-router"
Vue.use(Router)

import index from '../components/index.vue'
import notFound from '../components/notFound.vue'

const routes = [

    {
        path: '/',
        component:index
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
