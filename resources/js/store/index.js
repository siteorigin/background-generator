import Vue from 'vue'
import Vuex from 'vuex'
import _debounce from 'lodash/debounce'
import queryString from 'query-string'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        settings: {
            color: '#eff6ff',
            pattern: '45degreee_fabric',
            blend: '2',
            intensity: 20,
            noise: 0,
            invert: 0,
            '2x': 0
        }
    },

    getters: {
        settings: state => state.settings,
        backgroundUrl: (state) => {
            const params = queryString.stringify(state.settings)
            return `/api/image?${params}`
        }
    },

    mutations: {
        updateSettings: _debounce((state, payload) => {
            state.settings = Object.assign({}, state.settings, payload)
        }, 100)
    }
})
