<template>
    <div class="grid grid-rows-layout grid-cols-1">
        <loading ref="loading"/>
        <app-header/>
        <main
            class="bg-blue-100 flex relative justify-center sm:mt-20 sm:mb-16 px-4 py-12 sm:py-20 row-start-2 row-end-3"
        >
            <preview @background-image-loading="toggleLoader"/>
            <settings/>
        </main>
        <app-footer/>
        <vue-snotify/>
    </div>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex'
import _isEqual from 'lodash/isEqual'

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

    created () {
        if (window.location.search) {
            this.setQueryParamsToStore()
        }
    },

    computed: {
        ...mapGetters([
            'settings'
        ])
    },

    watch: {
        settings: {
            deep: true,
            handler (newValue, oldValue) {
                if (!_isEqual(newValue, oldValue)) {
                    this.updateQueryParams()
                }
            }
        }
    },

    methods: {
        ...mapMutations([
            'updateSettings'
        ]),
        toggleLoader (isLoading) {
            return isLoading ? this.$loading.start() : this.$loading.finish()
        },
        updateQueryParams () {
            const params = new URLSearchParams(window.location.search)
            Object.keys(this.settings).forEach((key) => params.set(key, this.settings[key]))
            window.history.replaceState({}, '', `${location.pathname}?${params.toString()}`)
        },
        setQueryParamsToStore () {
            const params = [...new URLSearchParams(window.location.search)]
                .reduce((acc, item) => ({ ...acc, [item[0]]: item[1] }), {})
            this.updateSettings(params)
        }
    },

    mounted () {
        this.$loading = this.$refs.loading
    }
}
</script>
