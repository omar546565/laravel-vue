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
      beforeEnter:(to,from,next) => {
            let isAuth = localStorage.getItem('success');
            if (isAuth != 1)next({name:'loginapp'})
            else next()
      }


    },

    {
        path: '/profile',
        component:profile,
        beforeEnter:(to,from,next) => {
            let isAuth = localStorage.getItem('success');
            if (isAuth != 1)next({name:'loginapp'})
            else next()
        }
    },
    {
        path: '/loginapp',
        component:loginapp,
        name:'loginapp',
        beforeEnter:(to,from,next) => {
            let isAuth = localStorage.getItem('success');
            if (isAuth == 1)next({name:'/'})
            else next()
        }
    },
    {
        path: '/registerapp',
        component:registerapp,
        name:'registerapp',
        beforeEnter:(to,from,next) => {
            let isAuth = localStorage.getItem('success');
            if (isAuth == 1)next({name:'/'})
            else next()
        }
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
