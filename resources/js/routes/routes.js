import Vue from "vue";
import Router from "vue-router"
Vue.use(Router)

import loginapp from '../auth/login'
import registerapp from '../auth/register'
import profile from '../setting/profile.vue'
import password from '../setting/password.vue'
import index from '../components/index.vue'
import notFound from '../components/notFound.vue'

const routes = [

    {
        path: '/',
        component:index,
        name:'/',
        beforeEnter:(to,form,next)=>{
            let authentcated = localStorage.getItem('success');
            if (authentcated != 1)next({name:'loginapp'})
            else next()
        }
    },
    {
        path: '/profile',
        component:profile,
        name:'profile',

        children:[
            {
                path: '/password',
                component:password,
                name:'password',
            }
        ],

        beforeEnter:(to,form,next)=>{
            let authentcated = localStorage.getItem('success');
            if (authentcated != 1)next({name:'loginapp'})
            else next()
        }
    },
    {
        path: '/loginapp',
        component:loginapp,
        name:'loginapp',
        beforeEnter:(to,form,next)=>{
            let authentcated = localStorage.getItem('success');
            if (authentcated == 1)next({name:'/'})
            else next()
        }
    },
    {
        path: '/registerapp',
        component:registerapp,
        name:'registerapp',
        beforeEnter:(to,form,next)=>{
            let authentcated = localStorage.getItem('success');
            if (authentcated == 1)next({name:'/'})
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
