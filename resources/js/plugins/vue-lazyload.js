import Vue from 'vue'
import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload, {
    loading: '/images/loader.svg',
    attempt: 1
})
