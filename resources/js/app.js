import { createApp } from 'vue'
import { store } from './store'

import App from './App.vue'

const app = createApp(App)

app.use(store)

app.directive('background-image', {
    updated (el, binding) {
        el.style.opacity = 0

        const image = document.createElement('img')
        image.addEventListener('load', () => {
            el.style.opacity = 1
            el.style.backgroundImage = 'url(' + binding.value + ')'
        })
        image.src = binding.value
    }
})

app.mount('#app')
