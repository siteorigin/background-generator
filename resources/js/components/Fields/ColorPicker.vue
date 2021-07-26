<template>
    <div class="relative" v-click-outside="close">
        <span class="text-sm text-gray-900 font-medium uppercase block mb-2">Color</span>
        <div class="relative rounded-lg" :style="{backgroundColor: currentColor}">
            <input
                :value="currentColor"
                type="color"
                class="rounded-lg h-14 w-full bg-transparent flex items-center px-2 relative transition duration-300 border-none"
            >
            <div
                class="text-center absolute uppercase font-medium w-full h-full top-0 left-0 flex justify-center items-center cursor-pointer"
                :class="{'text-gray-900': isLight, 'text-white': !isLight}"
                @click="openColorPicker"
            >
                <span>{{ currentColor || 'Color' }}</span>
            </div>
        </div>

        <chrome-picker
            v-if="isOpen"
            :value="currentColor"
            class="absolute z-50 left-1/2 transform -translate-x-1/2"
            @input="input"
        />
    </div>
</template>

<script>
import _debounce from 'lodash/debounce'
import { Chrome as ChromePicker } from 'vue-color'
import { isLightColor } from '~/utils'

export default {
    props: {
        value: {
            type: String,
            default: null
        }
    },

    components: {
        ChromePicker
    },

    data: () => ({
        isOpen: false,
        currentColor: null
    }),

    watch: {
        value () {
            if (this.currentColor !== this.value) {
                this.clear()
            }
        }
    },

    mounted () {
        this.clear()
    },

    computed: {
        isLight () {
            if (!this.currentColor) return true
            return isLightColor(this.currentColor)
        }
    },

    methods: {
        clear () {
            this.currentColor = this.value
        },
        input ({ hex }) {
            this.currentColor = hex
            this.update()
        },
        openColorPicker () {
            this.isOpen = true
        },
        close () {
            this.isOpen = false
        },
        update: _debounce(function () {
            this.$emit('input', this.currentColor)
        }, 100)
    }
}
</script>

<style>
input[type=color]::-webkit-color-swatch-wrapper {
    padding: 0;
}

input[type=color]::-webkit-color-swatch {
    border-style: none;
}
</style>
