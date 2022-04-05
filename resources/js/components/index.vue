<template>
    <div>


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
