<template>



    <div class="container">
        <div v-if="$data.typeOfUser==='admin' || $data.typeOfUser==='empleat'" class="mt-3 d-flex flex-row justify-content-between">
            <h3  class="">Reservas</h3>
            <a href='/reservarAdmin' class='btn btn-success'>Nova Reserva</a>
        </div>

        <div v-else class="mt-3 d-flex flex-row justify-content-between">
            <h3 class="">Les Meves Reservas</h3>
        </div>

        <div class="row mt-3">
            <table class="table table-striped table-hover col-11 mx-auto my-5">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Dia</th>
                    <th>Hora</th>
                    <th>Païs</th>
                    <th>Esta Confirmada?</th>
                    <th>Accions</th>
                    <th v-if="$data.typeOfUser==='admin'">Empleat</th>
                    <th v-else>Empleat...</th>


                </tr>
                </thead>
                <tbody>

                <tr v-for="reserva in reservas" :key="reserva.id">
                    <td>{{reserva.id_joc}}</td>
                    <td>{{reserva.day}}</td>
                    <td>{{reserva.hour}}</td>
                    <td>{{reserva.pais}}</td>


                    <td v-if="reserva.isConfirmed===null">
                        <a v-if="$data.typeOfUser==='admin' || $data.typeOfUser==='empleat'" v-on:click="confirmarReserva(reserva.id)" type="button" class="btn btn-primary">Confirmar Reserva</a>
                        <button v-else type="button" class="btn btn-warning">Reserva Pendent de Confirmar</button>
                    <td v-else>
                        <button type="button" class="btn btn-success">Reserva Confirmada</button>
                    </td>
                                       <td>
                                           <a v-if="$data.typeOfUser==='admin' || $data.typeOfUser==='empleat'" v-on:click="cancelarReserva(reserva.id)"  type="button" class="btn btn-danger">Cancelar Reserva</a>
                                           <form v-else-if="reserva.isConfirmed===null" @submit.prevent="modificarReserva(reserva.id)" method="post">
                                               <label style="padding: 20px">Modificar hora i dia:</label>
                                               <input style="width: 75px" type="datetime-local" id="horadia"
                                                      name="horadia"
                                                       v-model="mod_reserva.horadia">
                                               <button style=" width: 90px" type="submit" class="btn btn-success">Modificar Reserva</button>
                                           </form>
                                       </td>


                    <td v-if="reserva.id_empleat"><a class="btn btn-success">Empleat Asignat!</a></td>
                    <td v-else-if="$data.typeOfUser==='admin' || $data.typeOfUser==='empleat'">
                        <form @submit.prevent="assignarEmpleat(reserva.id)" method="post">
                            <select style="width: 100px" id="idEmpleat" name="idEmpleat" class="form-control" v-model="empleat.id_empleat">
                                <option v-for="empleat in allEmpleats" name="idEmpleat" :value="empleat.id">{{empleat.id}}</option>
                            </select>

                            <!--<input type="text" name="id" class="form-control" id="id" required v-model="empleat.id"></input>
                            -->

                            <button type="submit" class="btn btn-warning">Assignar Empleat</button>
                        </form>

                    </td>


                    <td v-else>
                        <button type="button" class="btn btn-warning">Empleat Pendent d'Assignar</button>
                    </td>

                </tr>

                </tbody>
            </table>
        </div>

    </div>


</template>

<script>

export default {
    name: "ReservasComponent",

    mounted() {
        this.getTypeOfUser();
        this.getAllEmpleats();
        this.getAllReservas();
    },

    data() {
        return {

            model:{

            },

            reservas: null,

            empleat: {id_empleat: '', id_reserva: ''},
            mod_reserva: {horadia:''},
            sala : {id:''},

            typeOfUser: null,
            allEmpleats: null,

            getSala(id) {
                let url = "getSala/" + id;

                axios.get(url).then(res => {
                    if (res.data === 2) {
                        return true;
                    }
                        return false;
                })
            }
        }
    },




    methods: {


        assignarSala(id){

            const param  ={
                id_sala: this.sala.id,
                id_reserva: id
            }

            let url ="assignarSala";

            axios.post(url,param).then(res=>{
                if (res){
                    this.$notify({
                        title: 'Correcte',
                        message: 'Sala asignada correctament',
                        type: 'success'
                    });
                    setTimeout(function() {
                        return window.location.href = "/reservas";
                    }, 2500);
                }
            });


        },

        getTypeOfUser(){
            let url = "getTypeOfUser";


            axios.get(url).then(res=>{
                this.typeOfUser = res.data;
                });
        },



        getAllEmpleats(){
            let url2 = "empleatsVue";
            axios.get(url2).then(res=>{
                this.allEmpleats = res.data;
            })
        },

        confirmarReserva(id){
            let url = "confirmar/"+id
            axios.get(url).then(res=>{
                this.$notify({
                    title: 'Correcte',
                    message: 'Reserva confirmada correctament',
                    type: 'success'
                });
                setTimeout(function() {
                    return window.location.href = "/reservas";
                }, 2500);

            })
        },

        cancelarReserva(id){
            let url = "delete/"+id
            axios.get(url).then(res=>
            {

               this.$notify({
                   title: 'Correcte',
                   message: 'Reserva eliminada correctament',
                   type: 'success'
               });
               setTimeout(function() {
                   return window.location.href = "/reservas";
               }, 2500);


            })

        },

        assignarEmpleat(id){
            const param = {
                id_empleat: this.empleat.id_empleat,
                id_reserva: id,

            }
            let url = "assignar"

            axios.post('/assignar', param).then(res =>{
                console.log(res);

                this.$notify({
                    title: 'Correcte',
                    message: 'Empleat assignat correctament',
                    type: 'success'
                });
                setTimeout(function() {
                    return window.location.href = "/reservas";
                }, 2500);



            })



        },

        getAllReservas(){
            let url2 = "getAllReservas";
            axios.get(url2).then(response=> {
                this.reservas = response.data;
                console.log(response.data)
            });
        },

        modificarReserva(id){

            let url = "modificarReserva";
            const param = {
                id_reserva: id,
                horadia: this.mod_reserva.horadia
            }

            axios.post('/modificarReserva', param).then(res =>{
                console.log(res);
                this.$notify({
                    title: 'Correcte',
                    message: 'Reserva modificada correctament',
                    type: 'success'
                });
                setTimeout(function() {
                    return window.location.href = "/reservas";
                }, 2500);



            })



        },

    }
}
</script>

<style scoped>

</style>
