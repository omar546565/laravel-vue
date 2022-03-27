import Vue from "vue";

import Vuex from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store(
    {
        state:{
            user:null,
            success:0,

        },
        getters:{
            user:(state)=>{
           return state.user
                },
            success:(state)=>{
           return state.success
                }
        },
        actions:{
            user(context , user){
                context.commit('user',user)
            },
            success(context , success){
                context.commit('success',success)
            },
        },
        mutations:{
            user(state,user){
                state.user = user
            },
            success(state,success){
                state.success = success
            },
        }
    });
export default store;
