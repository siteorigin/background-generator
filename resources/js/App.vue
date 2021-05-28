<template>
    <div class="grid grid-rows-layout grid-cols-1 h-screen">
        <header class="text-center p-3">Background Generator</header>
        <main class="bg-blue-100 overflow-hidden flex relative items-center justify-center row-start-2 row-end-3">
            <preview/>
            <settings/>
        </main>
        <footer-component/>
    </div>
</template>

<script>
import Preview from '~/components/Preview'
import Settings from '~/components/Settings'

import FooterComponent from '~/components/Footer'

export default {
    components: {
        Settings,
        Preview,
        FooterComponent
    }
}
</script>
