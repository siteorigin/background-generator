<template>
    <div class="grid grid-rows-layout grid-cols-1">
        <loading ref="loading" />
        <app-header />
        <main
            class="bg-blue-100 flex relative justify-center px-4 py-12 sm:py-20 row-start-2 row-end-3"
        >
            <preview @background-image-loading="toggleLoader" />
            <settings />
        </main>
        <app-footer />
        <vue-snotify />
    </div>
</template>

<script>
import Loading from '~/components/Loading'

import Preview from '~/components/Preview'
import Settings from '~/components/Settings'

import AppHeader from '~/components/Header'
import AppFooter from '~/components/Footer'

export default {
    components: {
        Loading,
        Settings,
        Preview,
        AppHeader,
        AppFooter
    },

    methods: {
        toggleLoader (isLoading) {
            return isLoading ? this.$loading.start() : this.$loading.finish()
        }
    },

    mounted () {
        this.$loading = this.$refs.loading
    }
}
</script>
