<template>
    <div class="flex items-center justify-center relative w-max mx-auto">
        <a
            :href="backgroundUrl"
            class="bg-blue-200 hover:bg-blue-700 font-medium shadow-sm text-white h-12 flex items-center rounded-l-lg px-4 relative z-10 text-sm sm:text-base"
            download
            @click="download"
        >
            <img src="/images/down.svg" class="mr-2.5" alt="Download"/> Download @1x image
        </a>
        <a
            :href="backgroundUrl2x"
            class="border-l border-white hover:bg-blue-700 text-white rounded-r-lg flex items-center justify-center w-12 h-12 bg-blue-200 relative z-10 focus:outline-none"
            download
            @click="download"
        >
            @2x
        </a>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import { downloadNotification } from '~/notifications'

export default {

    computed: {
        ...mapGetters([
            'backgroundUrl',
            'backgroundUrlWithOptions'
        ]),
        backgroundUrl2x () {
            return this.backgroundUrlWithOptions({ '2x': 1 })
        }
    },

    methods: {
        download () {
            this.$snotify.html(downloadNotification(this.backgroundUrl))
        }
    }
}
</script>
