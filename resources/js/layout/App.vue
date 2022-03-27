<template>
    <div>
        <header-app></header-app>
        <router-view></router-view>
    </div>
</template>

<script>
import headerApp from "./headerApp";
import axios from "axios";
import {mapGetters} from "vuex"

export default {
    name: "App",
    components:{
        headerApp,
    },
    mounted() {
        if (localStorage.getItem('success') ==1){
            this.$router.push({path:'/'})
        }else if(localStorage.getItem('success') !=1){
            this.$router.push({path:'/loginapp'})
        }
    },
    created() {
        axios.get('users').then((response)=>{
            let success =response.data.success
            let user =response.data.user
            this.$store.dispatch('success',success);
            this.$store.dispatch('user',user);
            }).catch((errors)=>{
            this.$store.dispatch('success',0);
            this.$store.dispatch('user','');
            })
    },
    computed:{
        ...mapGetters(['user']),
        ...mapGetters(['success']),
    }
}
</script>

<style scoped>

</style>
