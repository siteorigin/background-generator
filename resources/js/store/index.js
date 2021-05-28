import { createStore } from 'vuex'
import queryString from 'query-string'

export const store = createStore({
    state: {
        settings: {
            color: '#eff6ff',
            // pattern: null,
            // blendMode: null,
            // patternIntensity: null,
            // // noise: null,
            // invertPattern: null,
            // size: false
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
        updateSettings (state, payload) {
            state.settings = Object.assign({}, state.settings, payload)
        }
    }
})
