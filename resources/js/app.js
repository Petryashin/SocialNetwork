
import store from './store';
import api from './api'
require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('dialog-component', require('./components/DialogComponent.vue').default);
const App = Vue.component('app-component', require('./components/App.vue').default);

Vue.prototype.$api = api

const app = new Vue({
    el: '#vue-app',
    store
});
