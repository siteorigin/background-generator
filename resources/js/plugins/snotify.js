import Vue from 'vue'
import Snotify from 'vue-snotify'

const options = {
    toast: {
        position: 'leftTop',
        showProgressBar: false,
        timeout: 3500
    }
}

Vue.use(Snotify, options)
