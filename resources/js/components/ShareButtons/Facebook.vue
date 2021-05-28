<template>
    <div
        class="fb-like"
        data-href="https://bg.siteorigin.com"
        data-layout="button_count"
        data-action="like"
        data-show-faces="false"
        data-share="false"
        hidden
    />
</template>

<script>
export default {
    mounted () {
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0]
            if (d.getElementById(id)) return
            js = d.createElement(s)
            js.id = id
            js.src = `//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=${process.env.MIX_FACEBOOK_APP_ID}`
            fjs.parentNode.insertBefore(js, fjs)
        }(document, 'script', 'facebook-jssdk'))
    }
}
</script>
