<template>
    <header class="text-center p-3 relative">
        Background Generator
        <a href="#" class="text-gray-500 absolute right-5" @click.prevent="openHelpModal">Help</a>
    </header>
</template>

<script>
import HelpModal from './Modals/Help'

export default {
    methods: {
        openHelpModal () {
            this.$modal.show(HelpModal, {}, {
                scrollable: true,
                height: 'auto'
            })
        }
    }
}
</script>
