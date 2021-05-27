<template>
    <header>Background Generator</header>
    <main class="bg-blue-100 h-screen w-screen overflow-hidden flex">
        <preview/>
        <settings/>
    </main>
    <footer>
        Background Generator is a tool by SiteOrigin, with patterns from Subtle Patterns. Retweet Like
    </footer>
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
