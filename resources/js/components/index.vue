<template>
    <div>
        <h1>{{ user.name }}</h1>
        <h1>{{ user.email }}</h1>

        <input type="text" v-model="item.name">
        <input type="number" v-model="item.age">
        <button class="btn btn-danger" @click="pushertest"  >pusher</button>

    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "index",
    data(){
        return{
            item:{
                name:'',
                age:''
            }
        }
    },
    methods:{
        pushertest(){
            axios.post('pusher',this.item).then().catch()
        }

    },
    computed:{
        ...mapGetters(['user']),
        ...mapGetters(['success']),
    },
}

</script>

<style scoped>

</style>
