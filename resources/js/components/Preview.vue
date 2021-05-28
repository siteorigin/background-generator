<template>
    <div :style="style" class="absolute top-0 left-0 w-full h-full"/>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters([
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
