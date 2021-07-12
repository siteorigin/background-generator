<template>
    <div class="relative" v-click-outside="close">
        <span class="text-gray-900 font-medium uppercase block mb-2">Color</span>
        <div class="relative rounded-lg" :style="{backgroundColor: value}">
            <input
                :value="value"
                type="color"
                class="rounded-lg h-14 w-full bg-transparent flex items-center px-2 relative transition duration-300"
            >
            <div
                class="text-center absolute uppercase font-medium w-full h-full top-0 left-0 flex justify-center items-center cursor-pointer"
                :class="{'text-gray-900': isColorLight, 'text-white': !isColorLight}"
                @click="openColorPicker"
            >
                <span>{{ value || 'Color' }}</span>
            </div>
        </div>

        <chrome-picker
            v-if="isOpen"
            :value="value"
            class="absolute z-50"
            @input="update"
        />
    </div>
</template>

<script>
import { Chrome as ChromePicker } from 'vue-color'
import { hexIsLight } from '~/utils'

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
        isOpen: false
    }),

    computed: {
        isColorLight () {
            if (!this.value) return true
            return hexIsLight(this.value)
        }
    },

    methods: {
        update ({ hex }) {
            this.$emit('input', hex)
        },
        openColorPicker () {
            this.isOpen = true
        },
        close() {
            this.isOpen = false
        }
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
