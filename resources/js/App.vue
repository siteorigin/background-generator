<template>
    <div class="grid grid-rows-layout grid-cols-1 h-screen">
    <header class="text-center p-3">Background Generator</header>
    <main class="bg-blue-100 overflow-hidden flex relative items-center justify-center row-start-2 row-end-3">
        <preview/>
        <settings/>
    </main>
    <footer class=" p-3">
        <p class="text-xs">Background Generator is a tool by SiteOrigin, with patterns from Subtle Patterns. Retweet Like</p>
    </footer>
    </div>
</template>

<script>
import Preview from '~/components/Preview'
import Settings from '~/components/Settings'

export default {
    components: {
        Settings,
        Preview
    }
}
</script>
