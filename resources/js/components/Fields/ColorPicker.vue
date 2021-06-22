<template>
    <div class="relative rounded-md" :style="{backgroundColor: value}">
        <input
            :value="value"
            type="color"
            class="rounded-md h-10 w-full bg-transparent border border-gray-300 flex items-center px-2 relative transition duration-300"
            @input="update"
            ref="inputColor"
        >
        <div
            class="text-center absolute w-full h-full top-0 left-0 flex justify-center items-center cursor-pointer text-sm"
            :class="{'text-black': isColorLight, 'text-white': !isColorLight}"
            @click="openColorPicker"
        >
            <span>{{ value || 'Color' }}</span>
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
