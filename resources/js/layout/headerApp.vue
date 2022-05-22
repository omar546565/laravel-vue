<template>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="image/tabyan007.png" height="60" width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <router-link to="/loginapp" v-if="success!=1"  > <button @click="logoutforce" class="btn btn-success"  >login</button> </router-link>

                    <router-link to="/registerapp" v-if="success!=1"  > <button class="btn btn-primary"  >register</button> </router-link>

                    <div  v-if="success==1"  class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Setting
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li> <router-link class="dropdown-item" to="/profile">profile</router-link></li>


                            <li><hr class="dropdown-divider"></li>
                            <li><button class="btn btn-danger"   @click="logout" >logout</button></li>

                        </ul>
                    </div>


                </form>
            </div>
        </div>
    </nav>


</div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "header",
    data(){
        return{
            messages: {
                name:'name',
                age:'age'
            }



        }
    },
    mounted() {
        Pusher.logToConsole = true;

        var pusher = new Pusher('1ad927b627e77f6386ea', {
            cluster: 'mt1'
        });
        const this2 = this;
        var channel = pusher.subscribe('alertchannel');
        channel.bind('App\\Events\\AlertEvent', function(data) {

             const mydata = JSON.parse(JSON.stringify(data))
            this2.messages=mydata.message
        });


    },

    methods:{
        logoutforce(){
            this.$store.dispatch('success',0);
            this.$store.dispatch('user','');
            localStorage.setItem('token','')
            localStorage.setItem('success',0)
        },
        logout(){
            axios.get('userremove').then((response)=>{

                this.$store.dispatch('success',0);
                this.$store.dispatch('user','');
                localStorage.setItem('token','')
                localStorage.setItem('success',0)
                this.$router.push({path:'/loginapp'})
                Toast.fire({
                    position: 'top-center',
                    icon: 'success',

                    text: 'تم تسجيل الخروج بنجاح',
                })

            }).catch((errors)=>{

            })
        }
    },

    computed:{
        ...mapGetters(['user']),
        ...mapGetters(['success']),
    }
}
</script>

<style scoped>

</style>
