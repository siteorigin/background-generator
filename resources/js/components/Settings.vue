<template>
    <div
        class="relative bg-white rounded-lg text-left overflow-hidden shadow-md sm:max-w-744 sm:w-full"
    >
        <div class="p-5 sm:px-8 sm:py-10">
            <div class="mb-10">
                <color-picker v-model="form.color" />
            </div>
            <div class="flex space-x-6 mb-10">
                <div class="w-1/2">
                    <div class="mb-3 flex items-center justify-between">
                        <h4 class="text-gray-900 font-medium uppercase">
                            Pattern
                        </h4>
                        <label class="custom-checkbox text-13 text-gray-300">
                            <input
                                v-model="form.invert"
                                type="checkbox"
                                name="position"
                                :true-value="1"
                                :false-value="0"
                            />
                            <span />
                            Invert
                        </label>
                    </div>
                    <inline-select
                        v-model="form.pattern"
                        :options="patterns"
                        type="pattern"
                        placeholder="Search patterns..."
                    />
                    <range v-model="form.intensity" title="Pattern Intensity" />
                </div>
                <div class="w-1/2">
                    <h4 class="text-gray-900 font-medium uppercase mb-3">
                        Overlay
                    </h4>
                    <inline-select
                        v-model="form.blend"
                        :options="blendModes"
                        type="blend"
                        placeholder="Search overlay filters..."
                    />
                    <range v-model="form.noise" title="Noise" />
                </div>
            </div>

            <div class="flex items-center justify-center">
                <a
                    :href="backgroundUrl"
                    class="bg-blue-200 hover:bg-blue-700 font-medium shadow-sm text-white h-12 flex items-center rounded-l-lg px-4"
                    download
                    @click="download"
                >
                    <img src="/images/down.svg" class="mr-2.5" />
                    Download @1x image
                </a>
                <button
                    class="border-l border-white rounded-r-lg flex items-center justify-center w-10 h-12 bg-blue-200"
                >
                    <img src="/images/arrow-down.svg" />
                </button>
            </div>
        </div>

        <patterns />
    </div>
</template>

<script>
import { mapMutations, mapGetters } from 'vuex'
import _capitalize from 'lodash/capitalize'
import _isEqual from 'lodash/isEqual'

import InlineSelect from '~/components/Fields/InlineSelect'
import Range from '~/components/Fields/Range'
import ColorPicker from '~/components/Fields/ColorPicker'
import Patterns from '~/components/Patterns'
import { downloadNotification } from '~/notifications'

export default {
    components: {
        InlineSelect,
        Range,
        ColorPicker,
        Patterns
    },

    data: () => ({
        form: {}
    }),

    mounted () {
        this.clear()
    },

    computed: {
        ...mapGetters(['settings', 'backgroundUrl']),
        blendModes () {
            return Object.keys(window.config.blendModes).map(key => ({
                value: key,
                label: window.config.blendModes[key]
            }))
        },
        patterns () {
            return window.config.patterns.map(pattern => ({
                value: pattern,
                label: _capitalize(pattern.replace(/_/gi, ' '))
            }))
        }
    },

    watch: {
        form: {
            deep: true,
            handler () {
                if (!_isEqual(this.settings, this.form)) {
                    this.updatePreview()
                }
            }
        },
        settings: {
            deep: true,
            handler () {
                this.clear()
            }
        }
    },

    methods: {
        ...mapMutations(['updateSettings']),
        updatePreview () {
            this.updateSettings(this.form)
        },
        download () {
            this.$snotify.html(downloadNotification(this.backgroundUrl), {
                position: 'centerTop'
            })
        },
        clear () {
            this.form = Object.assign({}, this.settings)
        }
    }
}
</script>
