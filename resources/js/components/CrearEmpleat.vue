<template>
    <div class="mx-auto p-4" style="width: 30%">
    <form @submit.prevent="crear" method="post">

        <label style="padding: 20px;">Usuaris</label>
        <select style="margin-bottom: 50px;text-align: center; " id="userId" name="userId" class="form-control">
            <option v-for="usuari in usuaris" v-if="usuari.isEmpleat === null" name="idUser" :value="usuari.id">{{ usuari.name }}</option>

        </select>
        <div class="mb-3">
            <input placeholder="Introdueix l'Id de L'usuari" type="id" name="id" value="" class="form-control" id="id" required v-model="usuari.id">
        </div>

        <button style="text-align: center; margin: auto" type="submit" class="btn btn-success">Convertir en Empleat</button>

    </form>
    </div>

</template>

<script>
export default {
    mounted() {
        this.getUsers();
    },

    data() {
        return {
            usuaris: null,
            usuari : {id: ''}
        }
    },




    methods: {
        crear() {
            const id = this.usuari.id

            console.log(id)

            axios.post('/makeEmpleat', id).then(res=>{
                this.$notify({
                    title: 'Correcte',
                    message: 'Usuari fet empleat correctament',
                    type: 'success'
                });
                setTimeout(function() {
                    return window.location.href = "/users";
                }, 2500);
            })
        },

        getUsers(){
            let url = "/usersVue";
            axios.get(url).then(res=> {
                this.usuaris = res.data

            })
        }
    }


}

</script>

