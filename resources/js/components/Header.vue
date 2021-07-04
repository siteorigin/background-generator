<template>
    <header class="py-3 relative border-b border-gray-100">
        <div class="max-w-1096 mx-auto px-4 flex justify-between items-center">
            <a href="/" class="sm:text-xl text-gray-900">
                <h1 class="flex items-center">
                    <img src="/images/logo-sm.svg" class="w-auto mr-2.5" alt="Logo"/>
                    Background Generator
                </h1>
            </a>
            <a
                href="#"
                class="border-2 border-gray-100 hover:bg-gray-50 transition duration-200 rounded-lg h-10 px-2.5 sm:px-4 text-gray-900 font-medium text-sm flex items-center leading-none"
                @click.prevent="openHelpModal"
            >
                <img src="/images/help.svg" class="mr-2"> Help
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
                name: 'help'
            })
        }
    }
}
</script>
