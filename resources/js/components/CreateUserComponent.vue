<template>

        <div class="mx-auto p-4" style="width: 30%">
            <form @submit.prevent="crearUser" method="post">
                <input type="hidden" id="userId" name="userId" >
                <div class="mb-3">
                    <input placeholder="Name" type="name" name="name" class="form-control" id="nom" required v-model="user.name">
                </div>
                <div class="mb-3">
                    <input placeholder="Email" type="email" name="email" class="form-control" id="email" required v-model="user.email">
                </div>
                <div class="mb-3">
                    <input placeholder="Password" type="password" name="password" minlength="8" maxlength="15" class="form-control" id="password" required v-model="user.password">
                </div>
                <div class="mb-3">
                    <input placeholder="Telefon" type="telefon" name="telefon" value="" class="form-control" id="telefon" required v-model="user.telefon">
                </div>
                <div class="mb-3">
                    <input placeholder="Dni" type="dni" name="dni"  class="form-control" id="dni" required v-model="user.dni">
                </div>
                <button type="submit" class="btn btn-success">Crear</button>
            </form>
        </div>

</template>

<script>
export default {
    mounted() {

    },

    data() {
        return {
            user: {name: '',email:'',password:'',telefon: '', dni:''},

        }
    },




    methods: {

        crearUser(){
            const usuari = {
                name: this.user.name,
                email: this.user.email,
                password: this.user.password,
                telefon: this.user.telefon,
                dni:this.user.dni
            }

            axios.post('newUser', usuari).then(res =>{
                this.$notify({
                    title: 'Correcte',
                    message: 'Usuari creat correctament',
                    type: 'success'
                });
                setTimeout(function() {
                    return window.location.href = "/users";
                }, 2500);

            })

        },

    }


}

</script>
