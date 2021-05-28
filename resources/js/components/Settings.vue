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
                <div class="w-1/2">
                    <div class="mb-3 flex items-center justify-between">
                        <h4 class="text-gray-1000 font-medium text-sm">Pattern</h4>
                        <label class="custom-checkbox text-sm">
                            <input
                                v-model="form.invert"
                                type="checkbox"
                                name="position"
                                :true-value="1"
                                :false-value="0"
                            >
                            <span/>
                            Invert
                        </label>
                    </div>
                    <inline-select v-model="form.pattern" :options="patterns"/>
                    <range v-model="form.intensity" title="Pattern Intensity"/>
                </div>
                <div class="w-1/2">
                    <h4 class="mb-3 text-gray-1000 font-medium text-sm">Blend Mode</h4>
                    <inline-select v-model="form.blend" :options="blendModes"/>
                    <range v-model="form.noise" title="Noise"/>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <label class="custom-checkbox text-sm">
                    <input type="checkbox" v-model="form['2x']" :true-value="1" :false-value="0">
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
import _capitalize from 'lodash/capitalize'

import InlineSelect from '~/components/Fields/InlineSelect'
import Range from '~/components/Fields/Range'
import ColorPicker from '~/components/Fields/ColorPicker'

export default {
    components: {
        InlineSelect,
        Range,
        ColorPicker
    },

    data: () => ({
        form: {}
    }),

    mounted () {
        this.form = Object.assign({}, this.settings)
    },

    computed: {
        ...mapGetters([
            'settings',
            'backgroundUrl'
        ]),
        blendModes () {
            return Object.keys(window.config.blendModes).map(key => ({
                value: key,
                label: window.config.blendModes[key]
            }))
        },
        patterns () {
            return window.config.patterns.map(pattern => ({
                value: pattern,
                label: _capitalize(pattern.replace(/_/ig, ' '))
            }))
        }
    },

    watch: {
        form: {
            deep: true,
            handler () {
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
