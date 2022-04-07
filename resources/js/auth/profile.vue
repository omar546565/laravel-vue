<template>
    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">password</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active"  id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                            <div v-if="errors.mobile.length > 0" >
                                <h5> <span class="badge bg-danger">{{ errors.mobile[0] }}</span></h5>
                            </div>
                        </div>
                        <div class="mb-3" >
                            <label  >email</label>
                            <input type="text" class="form-control" v-model="user.email">
                            <div v-if="errors.email.length > 0" >
                                <h5> <span class="badge bg-danger">{{ errors.email[0] }}</span></h5>
                            </div>

                        </div>
                        <div class="mb-3" >
                            <button class="btn btn-success" @click="updateuser" >update</button>

                        </div>

                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div>
                    <h1>password</h1>
                    <div class="col-md-2 p-3 m-auto border-2 card" >
                        <div hidden class="mb-3" >
                            <label  >id</label>
                            <input type="number" class="form-control" v-model="user.id">

                        </div>
                        <label class="labelform">PASSWORD</label>
                        <input  type="password" placeholder="Min 8 charaters long" v-model="formdata.password" />

                        <label class="labelform">password_confirmation</label>
                        <input  type="password" placeholder="Min 8 charaters long" v-model="formdata.password_confirmation" />

                        <div class="mb-3 mt-4" >
                            <button class="btn btn-danger" @click="updatepass" >updatepass</button>

                        </div>

                    </div>

                </div>
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
            formdata:{
                password:"",
                password_confirmation:""
            },
            errors:{
                name:{},
                email:{},
                mobile:{},
                password:{},
            }
        }
    },
    methods:{
       updateuser(){
           axios.post('updateuser',this.user).then((response)=>{
                   Toast.fire({
                       position: 'top-center',
                       icon: 'success',
                       text: 'جاري تحديث البيانات ',
                   })
           }).catch((errors)=>{
                   this.errors = errors.response.data.errors;

               }
           )
       },
        updatepass(){
           axios.post('updatepass',this.formdata).then((response)=>{
               Toast.fire({
                   position: 'top-center',
                   icon: 'success',
                   text: 'تم تغيير كلمة المرور  ',
               })
           }).catch((errors)=>{
                   this.errors = errors.response.data.errors;
                   Toast.fire({
                       position: 'top-center',
                       icon: 'error',
                       text: `${this.errors.password}`,
                   })
               }
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
