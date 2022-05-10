<template>
    <div class="container">

        <div class="mt-3 d-flex flex-row justify-content-between">
            <h3 class="">Salas</h3>

            <form @submit.prevent="crearSala" method="post">
                <input type="hidden" id="userId" name="userId" >
                <div class="mb-3" style="display: flex">
                    <input style="height: 40px; width: 150px" placeholder="Name" type="name" name="name" class="form-control" id="nom" required v-model="sala.name">
                    <button style="height: 40px; width: 100px" type="submit" class="btn btn-success">Crear</button>
                </div>

            </form>
        </div>

        <div class="row mt-3">
            <table class="table table-striped table-hover col-11 mx-auto my-5">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom Sala</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="sala in salas" :key="sala.id">
                    <td>{{ sala.id }}</td>
                    <td>{{ sala.nom_sala }}</td>
                    <td>
                        <a v-on:click="deleteSala(sala.id)" type="button" class="btn btn-danger">Eliminar</a>
                    </td>


                </tr>

                </tbody>
            </table>
        </div>



    </div>

</template>

<script>
export default {
    name: "SalasComponent",

    mounted() {
        this.getSalas(false)
    },

    data() {
        return {
            model:{

            },

            salas: null,
            sala : {name:''},


        }
    },
    methods: {

        deleteSala(id){
            let url = "/deleteSala/"+id;
            axios.get(url).then(res=>{
                this.getSalas(true);
            })
        },

        crearSala(){
            let url = "/createSala/"+this.sala.name;

            axios.get(url).then(res=>{
                this.getSalas(false);
            })
        },

        getSalas(opt){
            let url = "getAllSalas";
            axios.get(url).then(res=>{
                this.salas = res.data

                if (opt) {
                    this.$notify({
                        title: 'Eliminat',
                        message: 'Sala eliminada correctament',
                        type: 'warning'
                    });
                    setTimeout(function () {
                        return window.location.href = "/salas";
                    }, 4000);
                }

            })
        }
    },
}
</script>

<style scoped>

</style>
