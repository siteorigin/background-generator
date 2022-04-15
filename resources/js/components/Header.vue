<template>
    <header class="py-4 h-20 relative sm:fixed w-screen sm:top-0 sm:left-0 z-40 border-b border-gray-100 bg-white">
        <div class="max-w-1096 mx-auto px-4 h-full flex justify-between items-center">
            <a href="/" class="sm:text-xl text-gray-900">
                <h1 class="flex items-center">
                    <img src="/images/logo-sm.svg" class="w-auto mr-2.5" alt="Background Generator Logo"/>
                    Background Generator
                </h1>
            </a>
            <a
                href="#"
                class="relative transition duration-200 text-gray-900 font-medium text-sm flex items-center leading-none"
                @click.prevent="openHelpModal"
            >
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
                name: 'help'
            })
        }
    }
}
</script>
