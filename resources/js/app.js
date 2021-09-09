

require('./bootstrap');

window.Vue = require('vue').default;
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css';
import store from './store';

Vue.use(Vuetify);


Vue.component('login-component', require('./components/pages/login.vue').default);
Vue.component('index-component', require('./components/pages/index.vue').default);
Vue.component('dashboard-component', require('./components/pages/dashboard.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    store
});
