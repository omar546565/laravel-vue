<template>
    <div>
        <form @submit.prevent="register">
            <div class="containerformregister" >
                <div class="brand-logoform">
                    <img src="/image/tabyan6.png" height="100" width="90">
                </div>
                <div class="brand-titleform">تبيان للبرمجة</div>
                <div class="inputsform">
                    <label class="labelform">name</label>
                    <input class="inputform" type="text" placeholder="name" v-model="formdata.name"  />
                    <div v-if="errors.name.length > 0" >
                        <h5> <span class="badge bg-danger">{{ errors.name[0] }}</span></h5>
                    </div>
                    <label class="labelform">EMAIL</label>
                    <input class="inputform" type="email" placeholder="example@test.com" v-model="formdata.email"  />
                    <div v-if="errors.email.length > 0" >
                        <h5> <span class="badge bg-danger">{{ errors.email[0] }}</span></h5>
                    </div>

                    <label class="labelform">PASSWORD</label>
                    <input class="inputform" type="password" placeholder="Min 8 charaters long" v-model="formdata.password" />
                    <div v-if="errors.password.length >0" >
                        <h5> <span class="badge bg-danger">{{ errors.password[0] }}</span></h5>
                    </div>
                    <label class="labelform">password_confirmation</label>
                    <input class="inputform" type="password" placeholder="Min 8 charaters long" v-model="formdata.password_confirmation" />
                    <button class="buttonform"   >register</button>
                </div>

            </div>
        </form>


    </div>
</template>

<script>
export default {
    name: "register",
    data(){
        return{
            formdata:{
                name:"",
                email:"",
                password:"",
                password_confirmation:""
            },
            errors:{
                name:{},
                email:{},
                password:{},
            }
        }
    },
    methods:{
        register(){
            axios.post('register',this.formdata).then((response)=>{
                let success =response.data.success
                let token =response.data.token
                let user =response.data.user
                localStorage.setItem('token',token)
                localStorage.setItem('success',success)
                this.$store.dispatch('success',success);
                this.$store.dispatch('user',user);
                window.setTimeout(function (){location.reload()},100)
                Toast.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: ` أهلا وسهلا ${response.data.user.name}`,
                    text: 'جاري معالجة البيانات',
                })

            }).catch((errors)=>{
                  this.errors = errors.response.data.errors;
                Toast.fire({
                    position: 'top-center',
                    icon: 'error',
                    text: 'يوجد معلومات مطلوبة',
                })
            })


        }
    }
}
</script>

<style scoped>

</style>
