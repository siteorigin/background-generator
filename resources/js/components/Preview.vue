<template>
    <div
        v-background-image="backgroundUrl"
        class="absolute top-0 left-0 w-full h-full transition duration-500"
    />
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters(['backgroundUrl'])
    }
}
</script>
