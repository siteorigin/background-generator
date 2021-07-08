import Vue from 'vue'
import Vuex from 'vuex'
import _isEqual from 'lodash/isEqual'
import _debounce from 'lodash/debounce'
import queryString from 'query-string'
import { DEFAULT_PATTERN } from '~/constants'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        settings: Object.assign({}, DEFAULT_PATTERN),
        patterns: localStorage.hasOwnProperty('savedPatterns') ? JSON.parse(localStorage.getItem('savedPatterns')) : []
    },

    getters: {
        settings: state => state.settings,
        backgroundUrl: (state) => {
            const params = queryString.stringify(state.settings)
            return `/api/image?${params}`
        },
        backgroundUrlWithOptions: (state) => (options = {}) => {
            const params = queryString.stringify(Object.assign({}, state.settings, options))
            return `/api/image?${params}`
        },
        patterns: state => state.patterns
    },

    mutations: {
        updateSettings: _debounce((state, payload) => {
            state.settings = Object.assign({}, state.settings, payload)
        }, 100),
        selectPatternMutation (state, payload) {
            state.settings = Object.assign({}, payload)
        },
        addCurrentPatternMutation (state, { backgroundUrl }) {
            state.patterns.push(Object.assign({}, state.settings, {
                backgroundUrl
            }))
            state.settings = Object.assign({}, DEFAULT_PATTERN)

            localStorage.setItem('savedPatterns', JSON.stringify(state.patterns))
        },
        removePatternMutation (state, payload) {
            const index = state.patterns.findIndex(item => _isEqual(item, payload))
            state.patterns.splice(index, 1)
            localStorage.setItem('savedPatterns', JSON.stringify(state.patterns))
        }
    },

    actions: {
        savePattern ({ commit, getters }) {
            commit('addCurrentPatternMutation', {
                backgroundUrl: getters.backgroundUrl
            })
        },
        selectPattern ({ commit }, payload) {
            commit('selectPatternMutation', payload)
        },
        removePattern ({ commit }, payload) {
            commit('removePatternMutation', payload)
        }
    }
})
