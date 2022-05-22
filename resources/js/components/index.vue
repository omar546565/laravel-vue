<template>
    <div>
        <div class="card p-3" style="margin: auto;width: 300px">
            <div class="mb-3">
                <label   class="form-label">name</label>
                <input type="text" class="form-control" name="name"  v-model="item.name" placeholder="name">
            </div>
            <div class="mb-3">
                <label   class="form-label">namelast</label>
                <input type="text" class="form-control" name="namelast" v-model="item.namelast" placeholder="namelast">
            </div>
            <div class="mb-3">
                <label   class="form-label">mobile</label>
                <input type="text" class="form-control" name="mobile" v-model="item.mobile"  placeholder="mobile">
            </div>

            <button v-if="!isEdit" @click="additem" class="btn btn-success">add</button>
            <button  v-if="isEdit" @click="updateitem" class="btn btn-primary">update</button>
        </div>
        <div class="card p-3 mt-2" style="margin: auto;width: 90%">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">mobile</th>
                    <th scope="col">edit - delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for=" nameslast in nameslastall"  >
                    <th scope="row">{{nameslast.id}}</th>
                    <td>{{nameslast.name}}</td>
                    <td>{{nameslast.namelast}}</td>
                    <td>{{nameslast.mobile}}</td>
                    <td>
                        <button @click="editeitem(nameslast)" class="btn btn-primary">edit</button>
                        <button @click="deleteitem(nameslast.id)" class="btn btn-danger">delete</button>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>



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
                namelast:'',
                mobile:'',
            },
            nameslastall:[],
            isEdit:false,
        }
    },
    mounted() {
   this.indexitem();
    },
    methods:{
        additem(){
            axios.post('namelast',this.item).then(res=>{
                Toast.fire({
                    position: 'top-center',
                    icon: 'success',
                    text: 'تم إدخال البيانات بنجاح ',
                })
               this.item = {}
                this.indexitem();
            })
        },
        updateitem(){
            axios.put('namelast/'+this.item.id,this.item).then(res=>{
                Toast.fire({
                    position: 'top-center',
                    icon: 'success',
                    text: 'تم تحديث البيانات بنجاح ',
                })
               this.item = {}
                this.indexitem();
            })
        },
        indexitem(){
            axios.get('namelast').then(res=>{
                this.nameslastall = res.data.nameslast;
            })

        },
        editeitem(nameslast){
            this.isEdit = true
         this.item={
             id:nameslast.id,
             name:nameslast.name,
             namelast:nameslast.namelast,
             mobile:nameslast.mobile,
         }
        },
        deleteitem(id){
          axios.delete('namelast/'+id).then(res=>{
              Toast.fire({
                  position: 'top-center',
                  icon: 'error',
                  text: 'تم حذف البيانات بنجاح ',
              })
              this.indexitem();
          })
        },


    },
    computed:{
        ...mapGetters(['user']),
        ...mapGetters(['success']),
    },
}

</script>

<style scoped>

</style>
