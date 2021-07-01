<template>
    <footer class="bg-gray-900 relative py-6 px-4">
        <p class="text-sm text-white text-center">
            A tool by
            <a href="https://siteorigin.com" target="_blank" class="text-white">SiteOrigin </a>
            with patterns by
            <a href="http://subtlepatterns.com" target="_blank" class="text-white">Subtle Patterns</a>.
        </p>
        <div class="absolute bg-white shadow-xl bottom-full right-0 p-6">
            <p class="text-15 text-gray-900 mb-4">
                Like what we have done?<br/>
                Please share:
            </p>
           <div class="flex">
            <twitter-button/>
            <facebook-button/>
           </div>
        </div>
    </footer>
</template>

<script>
import TwitterButton from '~/components/ShareButtons/Twitter'
import FacebookButton from '~/components/ShareButtons/Facebook'

export default {
    components: {
        TwitterButton,
        FacebookButton
    }
}
</script>
