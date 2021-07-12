<template>
    <footer class="bg-gray-900 relative py-6 px-4">
        <share-buttons/>

        <p class="text-sm text-gray-50 text-center mt-6 sm:mt-0">
            Built by
            <a href="https://siteorigin.com" target="_blank" class="text-white">SiteOrigin</a>
            with patterns from
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
