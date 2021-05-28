<template>
    <div
        class="rounded-md h-10 w-full border border-gray-300 flex items-center px-2 relative transition duration-300"
        :class="{'border-blue-600': isFocused}"
    >
        <input
            :value="modelValue"
            type="color"
            class="w-6 h-6 rounded-sm mr-3 border border-gray-300"
            @focus="isFocused = true"
            @blur="isFocused = false"
            @input="update"
        >
        <input
            :value="modelValue"
            class="text-xs text-gray-1000 font-medium focus:outline-none flex-grow h-6"
            @focus="isFocusedColor = true"
            @blur="isFocusedColor = false"
            @input="update"
        >
    </div>
</template>

<script>
export default {
    props: {
        modelValue: {
            type: String,
            default: null
        }
    },

    data: () => ({
        color: null,
        isFocused: false
    }),

    methods: {
        update (event) {
            this.$emit('update:modelValue', event.target.value)
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
