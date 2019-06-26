require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './Routes/routes';
import Home from './components/Frontend/Home.vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import User from './helpers/User';
import store from './helpers/vuex';
import Notifications from 'vue-notification'
import axios from 'axios';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import {Form, HasError, AlertError} from 'vform'

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);


Vue.prototype.$http = axios;


window.Vue = require('vue');
window.Form = Form;
Vue.use(Vuetify);

Vue.use(Notifications);
window.User = User;
window.EventBus = new Vue();


const router = new VueRouter({
    routes,
    mode: 'history'
});

new Vue({
    el: '#app',
    router,
    store,
    components: {
        Home,
    }

});
