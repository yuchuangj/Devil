import Vue from 'vue'
import App from './App.vue'
import store from './store'

Vue.config.productionTip = false

//挂载Vuex
Vue.prototype.$store =store

new App().$mount()
