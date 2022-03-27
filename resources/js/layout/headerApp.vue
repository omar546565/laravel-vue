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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <router-link to="/loginapp" v-if="success!=1"  > <button class="btn btn-success"  >login</button> </router-link>

                    <router-link to="/registerapp" v-if="success!=1"  > <button class="btn btn-primary"  >register</button> </router-link>


                    <button class="btn btn-danger"  v-if="success==1"  @click="logout" >logout</button>
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

        }
    },
    mounted() {
    },

    methods:{
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
