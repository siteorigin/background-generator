<template>
    <footer class="bg-gray-900 py-6 px-4 relative sm:fixed w-screen sm:bottom-0 sm:left-0 z-10">
        <share-buttons/>

        <p class="text-sm text-white text-center mt-6 sm:mt-0">
            A tool by
            <a href="https://siteorigin.com" target="_blank" class="text-white">SiteOrigin</a>
            with patterns by
            <a href="http://subtlepatterns.com" target="_blank" class="text-white">Subtle Patterns</a>.
        </p>
    </footer>
</template>

<script>
import ShareButtons from '~/components/ShareButtons'

export default {
    components: {
        ShareButtons
    }
}
</script>
