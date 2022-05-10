<template>
    <div class="mx-auto p-4" style="width: 30%">
        <form @submit.prevent="modificar" method="post">
            <input type="hidden" id="userId" name="userId" v-model="user.id">
            <div class="mb-3">
                <input placeholder="Name" type="name" name="name" value="" class="form-control" id="nom" required v-model="user.name">
            </div>
            <div class="mb-3">
                <input placeholder="Password" type="password" name="password" minlength="8" maxlength="15" class="form-control" id="password" required v-model="user.password">
            </div>
            <div class="mb-3">
                <input placeholder="Telefon" type="telefon" name="telefon" value="" class="form-control" id="telefon" required v-model="user.telefon">
            </div>
            <button type="submit" class="btn btn-warning">Modificar</button>
        </form>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getUserToModify();
    },

    data() {
        return {
            user: {id:'',name: '',password:'',telefon: ''},
            dataUser : null
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
