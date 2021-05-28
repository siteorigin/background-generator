<template>
    <a
        href="https://twitter.com/share"
        class="twitter-share-button"
        data-url="https://bg.siteorigin.com"
        data-text="Create custom, tileable background images for your site"
        data-via="SiteOrigin"
        data-related="SiteOrigin"
        hidden
    >
        Tweet
    </a>
</template>

<script>
export default {
    mounted () {
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {}
            if (d.getElementById(id)) return t.widgets.load()
            js = d.createElement(s)
            js.id = id
            js.src = 'https://platform.twitter.com/widgets.js'
            fjs.parentNode.insertBefore(js, fjs)

            t._e = []
            t.ready = function (f) {
                t._e.push(f)
            }
            return t
        }(document, 'script', 'twitter-wjs'))
    }
}
</script>
