<template>
    <div class="border-t border-gray-100 px-4 py-3 sm:px-6 sm:py-3">
        <div class="flex flex-no-wrap overflow-y-scroll items-center space-x-4">
            <button
                v-for="(pattern, index) in patterns"
                :key="index"
                class="rounded-sm border border-gray-100 w-8 h-8 flex-shrink-0"
                @click="selectPattern(pattern)"
            >
                <img :src="pattern.backgroundUrl" class="w-full h-full" alt="Preview">
            </button>
            <button class="focus:outline-none" @click="savePattern">
                <svg class="h-7 w-7 text-blue-500 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    computed: {
        ...mapGetters([
            'patterns'
        ])
    },

    methods: {
        ...mapActions([
            'savePattern',
            'selectPattern'
        ])
    }
}
</script>
