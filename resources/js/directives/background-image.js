import Vue from 'vue'

Vue.directive('background-image', {
    bind (el, binding) {
        el.style.opacity = '0'
        const image = document.createElement('img')
        image.addEventListener('load', () => {
            el.style.backgroundImage = 'url(' + binding.value + ')'
            el.style.opacity = '1'
        })
        image.src = binding.value
    },

    componentUpdated (el, binding, vnode) {
        vnode.context.$emit('background-image-loading', true)
        el.style.opacity = '0'
        const image = document.createElement('img')
        image.addEventListener('load', () => {
            el.style.backgroundImage = 'url(' + binding.value + ')'
            el.style.opacity = '1'
            vnode.context.$emit('background-image-loading', false)
        })
        image.src = binding.value
    }
})
