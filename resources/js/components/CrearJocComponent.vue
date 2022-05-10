<template>
    <div class="mx-auto p-4" style="width: 30%">
        <form @submit.prevent="crearUser" method="post">
            <input type="hidden" id="userId" name="userId" >
            <div class="mb-3">
                <input placeholder="Name" type="name" name="name" class="form-control" id="nom" required v-model="joc.nom">
            </div>
            <div class="mb-3">
                <input placeholder="Description" type="description" name="description" class="form-control" id="email" required v-model="joc.description">
            </div>

            <div class="form-group">
                <input type="file" name="file" id="file" class="input-file">
                <label  class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Choose a file</span>
                </label>
            </div>
            <button type="submit" class="btn btn-success">Crear</button>
        </form>
    </div>


</template>

<script>

export default {
    name: "CrearJocComponent",

    mounted() {

    },

    data() {
        return {
            joc: {nom: '',description:'',img:''},

        }


        (function () {
            "use strict";

            $(".input-file").each(function () {
                var $input = $(this),
                    $label = $input.next(".js-labelFile"),
                    labelVal = $label.html();

                $input.on("change", function (element) {
                    var fileName = "";
                    if (element.target.value)
                        fileName = element.target.value.split("\\").pop();
                    fileName
                        ? $label.addClass("has-file").find(".js-fileName").html(fileName)
                        : $label.removeClass("has-file").html(labelVal);
                });
            });
        })();



    },




    methods: {


        crearJoc(){
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

<style scoped>

</style>
