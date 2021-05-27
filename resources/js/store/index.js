import { createStore } from 'vuex'

export const store = createStore({
    state () {
        return {
            settings: {
                color: null,
                pattern: null,
                blendMode: null,
                patternIntensity: null,
                noise: null,
                invertPattern: null,
                size: false
            }
        }
    }
})
