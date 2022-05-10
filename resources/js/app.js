/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';



require('./bootstrap');

//window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('users-component', require('./components/UsersComponent.vue').default);
Vue.component('modify-user-component', require('./components/ModifyUserComponent.vue').default);
Vue.component('empleats-component', require('./components/EmpleatsComponent.vue').default);
Vue.component('crear-empleats-component', require('./components/CrearEmpleat.vue').default);
Vue.component('reservas-component', require('./components/ReservasComponent.vue').default);
Vue.component('create-user-component', require('./components/CreateUserComponent.vue').default);
Vue.component('reservar-admin-component', require('./components/ReservarAdminComponent.vue').default);
Vue.component('salas-component',require('./components/SalasComponent.vue').default);
Vue.component('crear-joc-component',require('./components/CrearJocComponent.vue').default);



Vue.use(ElementUI)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
