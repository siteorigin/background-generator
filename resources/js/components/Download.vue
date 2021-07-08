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
        <button
            class="border-l border-white hover:bg-blue-700 rounded-r-lg flex items-center justify-center w-10 h-12 bg-blue-200 relative z-10 focus:outline-none"
            @click="toggleDropdown"
        >
            <img src="/images/arrow-down.svg" alt="Select type">
        </button>

        <a
            v-if="open"
            :href="backgroundUrlWithOptions({'2x': 1})"
            class="text-sm sm:text-base hover:bg-blue-100 bg-white font-medium shadow-sm text-gray-900 h-14 flex items-center rounded-b-lg px-4 absolute -bottom-full left-0 w-full pt-2 focus:outline-none"
            download
            @click="download"
        >
            <img src="/images/down-dark.svg" class="mr-2.5" alt="Download @2x"> Download @2x image
        </a>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import { downloadNotification } from '~/notifications'

export default {
    data: () => ({
        open: false
    }),

    computed: {
        ...mapGetters([
            'backgroundUrl',
            'backgroundUrlWithOptions'
        ])
    },

    methods: {
        download () {
            this.$snotify.html(downloadNotification(this.backgroundUrl))
            this.open = false
        },
        toggleDropdown () {
            this.open = !this.open
        }
    }
}
</script>
