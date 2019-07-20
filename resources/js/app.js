/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


//COmponentes para los usuarios
//Para ver los usuarios
Vue.component('usuarios-component', require('./components/UsuariosComponent.vue').default);
//Para ver las academias
Vue.component('academias-component', require('./components/AcademiasComponent.vue').default);
//Para ver las materias
Vue.component('materias-component', require('./components/MateriasComponent.vue').default);
//Para ver los grupos
Vue.component('grupos-component', require('./components/GruposComponent.vue').default);

//Para ver los instructores
Vue.component('instructores-component', require('./components/InstructoresComponent.vue').default);

//Para ver los tickets
Vue.component('tickets-component', require('./components/TicketsComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
  data:{
    menu:0
  }
});
