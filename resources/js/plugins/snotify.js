import Vue from 'vue'
import Snotify from 'vue-snotify'

const options = {
    toast: {
        showProgressBar: false,
        timeout: 4500
    }
}

Vue.use(Snotify, options)
