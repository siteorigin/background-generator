<template>
    <header class="p-3 relative border-b border-gray-100">
        <div class="max-w-1096 mx-auto px-4 flex justify-between items-center">
            <img src="/images/logo.svg"/>
            <a href="#"
               class="border-2 border-gray-100 rounded-lg h-10 px-4 text-gray-900 font-medium text-sm flex items-center leading-none"
               @click.prevent="openHelpModal">
                    <img src="/images/help.svg" class="mr-2">
                    Help
            </a>
        </div>
    </header>
</template>

<script>
import HelpModal from './Modals/Help'

export default {
    methods: {
        openHelpModal () {
            this.$modal.show(HelpModal, {}, {
                scrollable: true,
                height: 'auto',
                adaptive: true,
                name: "help"
            })
        }
    }
}
</script>
