require('./bootstrap');

window.Vue = require('vue').default;

import {Form, HasError, AlertError} from 'vform';
window.Form  = Form;
// Vue.component(HasError.name, HasError);
// Vue.component(AlertError.name, AlertError);

let Fire =new Vue();
window.Fire = Fire;
//Import Alert
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;

// Progress Bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '20px'
})

import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes =[
    // { path: '/forgot-password', component:require('./components/Auth/ForgotPassword.vue').default },
    { path: '/dashboard', component:require('./components/ExampleComponent.vue').default },
    { path: '/user-list', component:require('./components/User/UserList.vue').default },
    // { path: '/data-level', component:require('./components/Pengguna/Data-level.vue').default }
]

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    el: '#app',
    router
});
