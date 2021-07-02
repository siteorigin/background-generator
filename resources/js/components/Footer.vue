<template>
    <footer class="bg-gray-900 relative py-6 px-4">
        <div class="sm:absolute bg-white shadow-xl bottom-full sm:right-0 px-4 py-2.5 sm:p-6 -mx-4 -mt-6 sm:m-0">
            <p class="text-15 text-gray-900 mb-4">
                Like what we have done?<br/>
                Please share:
            </p>
           <div class="flex">
            <twitter-button/>
            <facebook-button/>
           </div>
        </div>
        <p class="text-sm text-white text-center mt-6 sm:mt-0">
            A tool by
            <a href="https://siteorigin.com" target="_blank" class="text-white">SiteOrigin </a>
            with patterns by
            <a href="http://subtlepatterns.com" target="_blank" class="text-white">Subtle Patterns</a>.
        </p>
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
