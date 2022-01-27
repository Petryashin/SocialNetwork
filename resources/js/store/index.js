import Vuex from 'vuex';
import Vue from 'vue';
import modules from './modules'
import api from '../api'

Vue.use(Vuex)
Vuex.Store.prototype.$api = api

const store = new Vuex.Store({modules})
export default store