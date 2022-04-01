import Vue from 'vue'
import App from './App.vue'
import store from './store'
import {myRequest} from './config';
Vue.config.productionTip = false
//挂载Vuex
Vue.prototype.$store =store
Vue.prototype.$myRequest = myRequest
new App().$mount()

declare module "vue/types/vue"{
    interface Vue{
        $myRequest:any
    }
}
