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

        }
    },
    methods:{


    },
    computed:{
        ...mapGetters(['user']),
        ...mapGetters(['success']),
    },
}

</script>

<style scoped>

</style>
