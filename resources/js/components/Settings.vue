<template>
    <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
        <div class="flex justify-between items-center border-b border-gray-100 px-4 py-3 sm:px-6 sm:py-3">
            Settings
            <a href="#" class="text-gray-500">Help</a>
        </div>

        <div class="px-4 pt-6 pb-4 sm:p-6">
            <div class="mb-6">
                <h4 class="mb-3 text-gray-1000 font-medium text-sm">Background color</h4>
                <color-picker v-model="form.color"/>
            </div>
            <div class="flex space-x-6 mb-6">
                <div class="flex-grow">
                    <div class="mb-3 flex items-center justify-between">
                        <h4 class="text-gray-1000 font-medium text-sm">Pattern</h4>
                        <label class="custom-checkbox text-sm">
                            <input type="checkbox" name="position" v-model="isInvert" :value="false">
                            <span/>
                            Invert
                        </label>
                    </div>
                    <inline-select :options="optionsPattern"/>
                    <range title="Pattern Intensity"/>
                </div>
                <div class="flex-grow">
                    <h4 class="mb-3 text-gray-1000 font-medium text-sm">Blend Mode</h4>
                    <inline-select :options="optionsBlendMode"/>
                    <range title="Noise"/>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <label class="custom-checkbox text-sm">
                    <input type="checkbox" name="position" v-model="isGenerate2x" :value="false">
                    <span/>
                    Generate @2X
                </label>

                <a
                    :href="backgroundUrl"
                    class="bg-blue-500 hover:bg-blue-700 font-medium text-white py-2 px-4 rounded text-sm"
                    download
                >
                    Download image
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import { mapMutations, mapGetters } from 'vuex'

import InlineSelect from '~/components/fields/InlineSelect'
import Range from '~/components/fields/Range'
import ColorPicker from '~/components/fields/ColorPicker'

export default {
    components: {
        InlineSelect,
        Range,
        ColorPicker
    },

    data: () => ({
        backgroundColor: '000000',
        isFocusedColor: false,
        optionsPattern: ['Diagonal-noise', 'Diagmonds', 'Diagonal Striped Brick', 'Diagonal Waves', 'Diagonal Waves'],
        optionsBlendMode: ['Over', 'Add', 'Atop', 'Blend', 'Clear'],
        isInvert: false,
        isGenerate2x: false,
        form: {},
        test: null
    }),

    mounted () {
        this.form = Object.assign({}, this.settings)
    },

    computed: {
        ...mapGetters([
            'settings',
            'backgroundUrl'
        ])
    },

    watch: {
        form: {
            deep: true,
            handler () {
                console.log(123123)
                this.updatePreview()
            }
        }
    },

    methods: {
        ...mapMutations([
            'updateSettings'
        ]),
        updatePreview () {
            this.updateSettings(this.form)
        }
    }
}
</script>
