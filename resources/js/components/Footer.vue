<template>
    <footer class="flex items-center pb-3 px-3 pt-5">
        <p class="text-xs mr-4 h-7 pt-0.5">
            Background Generator is a tool by <a href="https://siteorigin.com" target="_blank" class="underline text-blue-600">SiteOrigin</a>,
            with patterns from <a href="http://subtlepatterns.com" target="_blank" class="underline text-blue-600">Subtle Patterns</a>.
        </p>

        <div class="flex items-center space-x-4 ml-auto">
           <div class="h-7">
            <twitter-button/>
           </div>
            <facebook-button/>
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
