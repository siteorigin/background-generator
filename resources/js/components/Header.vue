<template>
    <header class="py-4 h-20 relative border-b border-gray-100">
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
                <img src="/images/help-img.jpg" class="mr-3 h-12 w-16 rounded-lg object-cover">
                <span class="flex items-center justify-center absolute -bottom-3 left-5 bg-blue-200 rounded-full w-6 h-6">
                    <svg width="7" height="8" viewBox="0 0 7 8" fill="none"><path id="Triangle" d="M6.19995 4.0999L-4.86374e-05 7.7999L-4.86374e-05 0.399902L6.19995 4.0999Z" fill="white"/></svg>
                </span>
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
