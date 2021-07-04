<template>
    <div
        v-show="show"
        class="sm:absolute bg-white shadow-xl bottom-full sm:right-0 px-4 py-2.5 sm:p-6 -mx-4 -mt-6 sm:m-0"
    >
        <p class="text-15 text-gray-900 mb-4">
            Like what we have done?<br />
            Please share:
        </p>
        <div class="flex space-x-2.5">
            <twitter />
            <facebook />
        </div>
    </div>
</template>

<script>
import Twitter from './Twitter'
import Facebook from './Facebook'

export default {
    components: {
        Twitter,
        Facebook
    },

    data: () => ({
        show: false
    }),

    mounted () {
        setTimeout(() => (this.show = true), 5000)
    }
}
</script>
