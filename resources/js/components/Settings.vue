<template>
    <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl sm:my-8 sm:max-w-lg sm:w-full">
        <div class="px-4 pb-4 sm:p-6">
            <div class="mb-6">
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
                    <inline-select v-model="form.pattern" :options="patterns" type="pattern"/>
                    <range v-model="form.intensity" title="Pattern Intensity"/>
                </div>
                <div class="w-1/2">
                    <h4 class="mb-3 text-gray-1000 font-medium text-sm">Overlay</h4>
                    <inline-select v-model="form.blend" :options="blendModes" type="blend"/>
                    <range v-model="form.noise" title="Noise"/>
                </div>
            </div>

            <div class="flex items-center justify-center">
                <a
                    :href="backgroundUrl"
                    class="bg-blue-500 hover:bg-blue-700 font-medium text-white py-2 px-4 rounded text-sm mr-5"
                    download
                    @click.prevent="download"
                >
                    Download image
                </a>
                <label class="custom-checkbox text-sm">
                    <input type="checkbox" v-model="form['2x']" :true-value="1" :false-value="0">
                    <span/>
                    @2X
                </label>
            </div>
        </div>
        <div class="border-t border-gray-100 px-4 py-3 sm:px-6 sm:py-3">
            <div class="flex flex-no-wrap overflow-y-scroll items-center space-x-4">
                <button v-for="i in 4" class="rounded-sm border border-gray-100 w-8 h-8 flex-shrink-0">
                    <img
                        src="/api/image?2x=0&amp;blend=2&amp;color=%23eff6ff&amp;intensity=20&amp;invert=0&amp;noise=0&amp;pattern=45degreee_fabric"
                        class="w-full h-full">
                </button>
                <button class="focus:outline-none">
                    <svg class="h-7 w-7 text-blue-500 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>
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
        },
        toastHtml() {
            return `<div class="flex text-sm"><img src="${this.backgroundUrl}" class="w-20 h-20 mr-3" alt="">Your pattern is downloading! The Download should start shortly.</div>`
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
        },
        download () {
            this.$snotify.html(this.toastHtml, {
                position: 'leftTop'
            })
        }
    }
}
</script>
