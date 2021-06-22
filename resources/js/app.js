import Vue from 'vue'
import App from './App.vue'
import store from './store'

import './directives'

Vue.config.productionTip = false

new Vue({
    el: '#app',
    store,
    render: h => h(App)
})
