<template>
<div>
    <h1>profile</h1>
    <div class="col-md-2 p-3 m-auto border-2 card" >
        <div class="mb-3" >
            <label  >id</label>
            <input type="number" class="form-control" v-model="user.id">

        </div>
        <div class="mb-3" >
            <label  >name</label>
            <input type="text" class="form-control" v-model="user.name">

        </div>
        <div class="mb-3" >
            <label  >gender</label>
            <select   class="form-control" v-model="user.gender">
                <option value=""></option>
                <option value="ذكر">ذكر</option>
                <option value="أنثى">أنثى</option>
            </select>

        </div>
        <div class="mb-3" >
            <label  >mobile</label>
            <input type="number" class="form-control" v-model="user.mobile">

        </div>
        <div class="mb-3" >
            <label  >email</label>
            <input type="text" class="form-control" v-model="user.email">

        </div>
        <div class="mb-3" >
            <button class="btn btn-success" @click="updateuser" >update</button>

        </div>

    </div>

</div>
</template>

<script>
import {mapGetters} from "vuex";
import axios from "axios";

export default {
    name: "profile",
    data(){
        return{

        }
    },
    methods:{
       updateuser(){
           axios.post('updateuser',this.user).then(
               Toast.fire({
                   position: 'top-center',
                   icon: 'success',
                   text: 'جاري تحديث البيانات ',
               })

           ).catch(

           )
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
