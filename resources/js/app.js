
require('./bootstrap');
import store from './store';
import api from './api'

window.Vue = require('vue').default;


Vue.component('dialog-component', require('./components/dialog/DialogComponent.vue').default);
Vue.component('message-component', require('./components/dialog/WindowMessageComponent.vue').default);
Vue.component('app-component', require('./components/App.vue').default);

Vue.prototype.$api = api

const app = new Vue({
    el: '#vue-app',
    store
});
