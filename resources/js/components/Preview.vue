<template>
    <div :style="style"/>
</template>

<script>
export default {
    computed: {
        style () {
            return {
                backgroundImage: 'url(' + this.image + ')'
            }
        },
        image () {
            return `/api/image?color=ffe5e5`
        }
    }
}
</script>
