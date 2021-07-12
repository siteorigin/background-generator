<template>
    <div
        class="relative bg-white rounded-lg text-left overflow-hidden shadow-md sm:max-w-744 sm:w-full"
    >
        <div class="p-5 sm:px-8 sm:py-10">
            <div class="mb-10">
                <color-picker v-model="form.color"/>
            </div>
            <div class="sm:flex sm:space-x-10 mb-10">
                <div class="sm:w-1/2">
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
                            <span/>
                            Invert
                        </label>
                    </div>
                    <inline-select
                        v-model="form.pattern"
                        :options="patterns"
                        :color="form.color"
                        type="pattern"
                        placeholder="Search patterns..."
                    />
                    <range v-model="form.intensity" title="Pattern Intensity"/>
                </div>
                <div class="sm:w-1/2 mt-10 sm:mt-0">
                    <h4 class="text-sm text-gray-900 font-medium uppercase mb-3">
                        Overlay
                    </h4>
                    <inline-select
                        v-model="form.blend"
                        :options="blendModes"
                        :color="form.color"
                        type="blend"
                        placeholder="Search overlay filters..."
                    />
                    <range v-model="form.noise" title="Noise"/>
                </div>
            </div>
            <download />
        </div>
        <patterns/>
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
import Download from '~/components/Download'

export default {
    components: {
        InlineSelect,
        Range,
        ColorPicker,
        Patterns,
        Download
    },

    data: () => ({
        form: {}
    }),

    mounted () {
        this.clear()
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
        ...mapMutations([
            'updateSettings'
        ]),
        updatePreview () {
            this.updateSettings(this.form)
        },
        clear () {
            this.form = Object.assign({}, this.settings)
        }
    }
}
</script>
