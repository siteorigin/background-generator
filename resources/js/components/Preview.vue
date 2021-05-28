<template>
    <transition name="fade">
        <div
            v-background-image="backgroundUrl"
            class="absolute top-0 left-0 w-full h-full transition duration-700"
        />
    </transition>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters([
            'settings',
            'backgroundUrl'
        ]),
        style () {
            return {
                backgroundImage: 'url(' + this.backgroundUrl + ')'
            }
        }
    }
}
</script>
