<template>
    <div class="container">

        <div class="mt-3 d-flex flex-row justify-content-between">
            <h3 class="">Empleats</h3>

        </div>

        <div class="row mt-3">
            <table class="table table-striped table-hover col-11 mx-auto my-5">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="empleat in empleats" :key="empleat.id">
                    <td>{{ empleat.id }}</td>
                    <td>{{ empleat.name }}</td>
                    <td>{{ empleat.email }}</td>
                    <td>
                        <a v-on:click="deleteEmpleat(empleat.id)" type="button" class="btn btn-danger">Eliminar</a>
                        <a v-on:click="modifyEmpleat(empleat.id)" type="submit" class="btn btn-warning">Modificar</a>
                    </td>


                </tr>
                </tbody>
            </table>
        </div>



    </div>

</template>

<script>
export default {
    name:'empleats-component',

    mounted() {
        this.getEmpleats(false)

    },

    data() {
        return {
            model:{

            },

            empleats: null,
            tableData: this.empleats,

        }
    },
    methods: {
        getEmpleats(opt){
            let url = '/empleatsVue';
            axios.get(url).then(res=>{
                this.empleats = res.data;

                console.log(this.empleats);
            })
            if (opt) {
                this.$notify({
                    title: 'Eliminat',
                    message: 'Usuari eliminat de la llista de Empleats correctament',
                    type: 'warning'
                });
            }

        },

        deleteEmpleat(id){
            let url = "deleteEmpleat/"+id;
            axios.get(url).then(res =>{
                this.getEmpleats(true);
            })

        },

        modifyEmpleat(id){
            let url = "modifyUsr/"+id;
            axios.get(url).then(res=>{
                if (res){
                    return window.location.href = "/modificar"
                }else{
                    return false;
                }

            });
        }

/*
        modifyUsers(id){
            let url = "modifyUsr/"+id;
            axios.get(url).then(res=>{
                if (res){
                    return window.location.href = "/modificar"
                }else{
                    return false;
                }

            });

        }
        */
    },
    }

</script>

