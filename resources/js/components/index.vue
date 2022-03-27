<template>
    <div>
        <h1>{{ user.name }}</h1>
        <h1>{{ user.email }}</h1>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "index",
    computed:{
        ...mapGetters(['user']),
        ...mapGetters(['success']),
    },
}

</script>

<style scoped>

</style>
