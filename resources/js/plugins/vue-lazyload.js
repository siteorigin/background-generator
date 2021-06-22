import Vue from 'vue'
import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload, {
    preLoad: 0.7,
    throttleWait: 300
})
