/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import dt from "datatables.net-dt";
import dtcss from "datatables.net-dt/css/jquery.dataTables.min.css";

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('secretaria', require('./components/Secretaria.vue').default);
Vue.component('consultorio', require('./components/Consultorio.vue').default);
Vue.component('doctor', require('./components/Doctor.vue').default);
Vue.component('paciente', require('./components/Paciente.vue').default);
Vue.component('home', require('./components/Home.vue').default);
Vue.component('perfil', require('./components/Perfil.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: function(){
        return{
            // permitirá controlar que vista se debe de mostrar
            // para cada opcion que se seleccione del sidebar
            menu : 0,
            // permite controlar y visualizar las notificaciones
            notifications : []
        };
    },
});
