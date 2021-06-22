import Vue from 'vue'

Vue.directive('background-image', {
    update (el, binding) {
        el.style.opacity = '0'

        const image = document.createElement('img')
        image.addEventListener('load', () => {
            el.style.backgroundImage = 'url(' + binding.value + ')'
            el.style.opacity = '1'
        })
        image.src = binding.value
    }
})
