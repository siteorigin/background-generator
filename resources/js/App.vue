<template>
    <div class="grid grid-rows-layout grid-cols-1">
        <app-header/>
        <main class="bg-blue-100 flex relative justify-center py-20 row-start-2 row-end-3">
            <preview/>
            <settings/>
        </main>
        <app-footer/>
        <vue-snotify/>
    </div>
</template>

<script>
import Preview from '~/components/Preview'
import Settings from '~/components/Settings'

import AppHeader from '~/components/Header'
import AppFooter from '~/components/Footer'

export default {
    components: {
        Settings,
        Preview,
        AppHeader,
        AppFooter
    }
}
</script>
