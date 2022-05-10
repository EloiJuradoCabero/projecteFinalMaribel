<template>
    <div class="container">

    <div class="mt-3 d-flex flex-row justify-content-between">
        <h3 class="">Usuaris</h3>
        <a href='crearUsuari' class='btn btn-success'>Crear Usuari</a>
    </div>

    <div class="row mt-3">
        <table class="table table-striped table-hover col-11 mx-auto my-5">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>IsAdmin</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.password }}</td>
                <td>{{ user.isAdmin }}</td>
                <td>
                    <a v-on:click="delteUser(user.id)" type="button" class="btn btn-danger">Eliminar</a>
                    <a v-on:click="modifyUsers(user.id)" type="button" class="btn btn-warning">Modificar</a>
                    <a v-if="user.isEmpleat === null" v-on:click="makeEmpleat(user.id)" type="button" class="btn btn-info">Fer Empleat</a>
                    <a v-else type="button" class="btn btn-dark">Ja es Empleat!</a>
                    <a v-if="user.isAdmin === null" v-on:click="makeAdmin(user.id)" type="button" class="btn btn-light">Fer Admin</a>

                </td>


            </tr>

            </tbody>
        </table>
    </div>



    </div>

</template>

<script>
export default {
    name:'users-component',

    mounted() {
        this.getUsers(false)

    },

    data() {
        return {
            model:{

            },

            users: null,

            tableData: this.users,

        }
    },
    methods: {
        getUsers(opt){
            let url = '/usersVue';
            axios.get(url).then(res=>{
                this.users = res.data;
            })
            if (opt) {
                this.$notify({
                    title: 'Eliminat',
                    message: 'Usuari eliminat correctament',
                    type: 'warning'
                });
                setTimeout(function () {
                    return window.location.href = "/users";
                }, 4000);
            }

        },

        delteUser(id){
            let url = "/deleteUsr/"+id;
            axios.get(url).then(res=>{
                this.getUsers(true);
            })
        },

        modifyUsers(id){
            let url = "modifyUsr/"+id;
            axios.get(url).then(res=>{
                if (res){
                    return window.location.href = "/modificar"
                }else{
                    return false;
                }

            });

        },

        makeEmpleat(id){
            let url = "makeEmpleat/"+id;
            axios.get(url).then(res =>{
                if (res){
                    this.getUsers(false);
                }else{
                    return false
                }
            })

        },

        makeAdmin(id){
            let url = "makeAdmin/"+id;
            axios.get(url).then(res =>{
                if (res){
                    this.getUsers(false);
                }else{
                    return false
                }
            })

        }
    },
}
</script>
