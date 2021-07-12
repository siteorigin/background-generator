<template>
    <div class="px-5 sm:px-8 py-7 shadow-lg">
        <h2 class="text-sm text-gray-900 font-medium uppercase mb-1">Saved steps</h2>
        <div class="flex flex-no-wrap overflow-x-auto items-center space-x-3 py-2.5">
            <button
                class="focus:outline-none w-12 h-12 bg-blue-200 border border-blue-200 rounded-lg flex items-center justify-center flex-shrink-0"
                @click="savePattern"
            >
                <img src="/images/plus.svg">
            </button>

            <hr v-if="patterns.length" class="w-px h-6 bg-gray-100 flex-shrink-0"/>

            <div
                v-for="(pattern, index) in sortedPetterns"
                :key="index"
                class="relative group w-12 h-12"
            >
                <button
                    class="w-5 h-5 rounded-full bg-red-100 absolute -top-2.5 -right-2.5 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200"
                    @click="removePattern(pattern)"
                >
                    <img src="/images/x.svg">
                </button>
                <button
                    class="rounded-lg w-12 h-12 flex-shrink-0 border border-gray-400 transition duration-200 group-hover:border-blue-200"
                    :style="{'backgroundImage': `url(${pattern.backgroundUrl})`}"
                    @click="selectPattern(pattern)"
                />
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import _orderBy from 'lodash/orderBy'

export default {
    computed: {
        ...mapGetters([
            'patterns'
        ]),

        sortedPetterns () {
            return _orderBy(this.patterns, ['id'], ['desc'])
        }
    },

    methods: {
        ...mapActions([
            'savePattern',
            'selectPattern',
            'removePattern'
        ])
    }
}
</script>
