<template>
    <div>
        <form @submit.prevent="login">
            <div class="containerform" >
                <div class="brand-logoform">
                    <img src="/image/tabyan6.png" height="100" width="90">
                </div>
                <div class="brand-titleform">تبيان للبرمجة</div>
                <div class="inputsform">
                    <label class="labelform">EMAIL</label>
                    <input class="inputform" type="email" placeholder="example@test.com" v-model="formdata.email"  />
                    <label class="labelform">PASSWORD</label>
                    <input class="inputform" type="password" placeholder="Min 8 charaters long" v-model="formdata.password" />
                    <button class="buttonform" @click="login"  >LOGIN</button>
                </div>

            </div>
        </form>


    </div>
</template>

<script>
export default {
    name: "login",
    data(){
        return{
            formdata:{
                email:"",
                password:""
            },
        }
    },
    methods:{
        login(){
            axios.post('login',this.formdata).then((response)=>{
                let success =response.data.success
                let token =response.data.token
                let user =response.data.user
                localStorage.setItem('token',token)
                localStorage.setItem('success',success)
                this.$store.dispatch('success',success);
                this.$store.dispatch('user',user);

                this.$router.push({path:'/'});
                window.setTimeout(function (){location.reload()},100)
                Toast.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: ` أهلا وسهلا ${response.data.user.name}`,
                    text: 'جاري معالجة البيانات',
                })

            })


        }
    }
}
</script>

<style scoped>

</style>
