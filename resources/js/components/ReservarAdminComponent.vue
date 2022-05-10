<template>
    <div class="mx-auto p-4" style="width: 30%">
        <form @submit.prevent="crearReserva" method="post">
            <div class="mb-3">
                <label  class="form-label">Usuari</label>
                <input type="name" class="form-control" id="nom">
            </div>
            <div class="mb-3">
                <label  class="form-label">Joc</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Day Hour</label>
                <input type="password" class="form-control" id="contrasenya">
            </div>
            <div class="mb-3">
                <label class="form-label">Pais</label>
                <input type="name" class="form-control" id="telefon" v-model="reserva.organitzacio">
            </div>
            <div class="mb-3">
                <label  class="form-label">Organitzacio</label>
                <input type="name" class="form-control" id="telefon" v-model="reserva.organitzacio">
            </div>
            <button type="submit" class="btn btn-success">Reservar</button>

        </form>
    </div>
</template>

<script>
export default {
    name:'ReservarAdminComponent',

    mounted() {
        this.getUserToModify();
    },

    data() {
        return {
            reserva: {id_user:'', id_joc:'',dayhour:'', pais:'', organitzacio:''},

        }
    },




    methods: {
        modificar() {

            /*
            if (this.sala.nom.trim() === '' || this.sala.capacitat.trim() === '') {
                alert('Debes completar todos los campos antes de guardar');
                return;
            }
            */

            // console.log(this.sala.nom , this.sala.capacitat )
            const param = {
                id: this.user.id,
                name: this.user.name,
                password: this.user.password,
                telefon: this.user.telefon
            }


            console.log(param)

            axios.post('/modificarUsr', param).then(res =>{
                this.$notify({
                    title: 'Correcte',
                    message: 'Usuari modificat correctament',
                    type: 'success'
                });
                setTimeout(function() {
                    return window.location.href = "/users";
                }, 2500);

            })
        },

        getUserToModify(){

            let url = "/getDataUsr";
            axios.get(url).then(res=> {
                this.dataUser = res.data
                this.user.id = this.dataUser.id;
                this.user.name = this.dataUser.name;
                this.user.telefon = this.dataUser.telefon;
            })
        }
    }


}
</script>

<style scoped>

</style>
