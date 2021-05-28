<template>
    <div :style="style" class="absolute top-0 left-0 w-full h-full"/>
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
                backgroundColor: this.settings.color,
                backgroundImage: 'url(' + this.backgroundUrl + ')'
            }
        }
    }
}
</script>
