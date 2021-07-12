<template>
    <div>
        <span class="text-sm text-gray-900 font-medium uppercase block mb-2">Color</span>
        <div class="relative rounded-lg" :style="{backgroundColor: value}">
            <input
                :value="value"
                type="color"
                class="rounded-lg h-14 w-full bg-transparent flex items-center px-2 relative transition duration-300"
                @input="update"
                ref="inputColor"
            >
            <div
                class="text-center absolute uppercase font-medium w-full h-full top-0 left-0 flex justify-center items-center cursor-pointer"
                :class="{'text-gray-900': isColorLight, 'text-white': !isColorLight}"
                @click="openColorPicker"
            >
                <span>{{ value || 'Color' }}</span>
            </div>
        </div>
    </div>
</template>

<script>
import { hexIsLight } from '~/utils'

export default {
    props: {
        value: {
            type: String,
            default: null
        }
    },

    computed: {
        isColorLight () {
            if (!this.value) return true
            return hexIsLight(this.value)
        }
    },

    methods: {
        update (event) {
            this.$emit('input', event.target.value)
        },
        openColorPicker () {
            this.$refs.inputColor.click()
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
