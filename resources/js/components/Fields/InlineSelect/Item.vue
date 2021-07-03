<template>
    <li
        class="hover:bg-blue-100 border-gray-400 border transition duration-300 cursor-pointer flex items-center overflow-hidden h-16 rounded-lg mb-4 text-gray-500 capitalize"
        :class="{
            'border-blue-200 bg-blue-100 font-medium': value === option.value
        }"
        @click="select(option.value)"
    >
        <img
            v-lazy="backgroundUrl"
            class="w-16 h-16 mr-3 border-r border-gray-400"
            :class="{ 'border-blue-200': value === option.value }"
            :alt="option.label"
        />
        {{ option.label }}
    </li>
</template>

<script>
export default {
    props: {
        option: {
            type: Object,
            default: () => ({})
        },
        value: {
            type: String | Number,
            default: null
        },
        type: {
            type: String,
            default: null
        }
    },

    computed: {
        backgroundUrl () {
            return this.$store.getters.backgroundUrlWithOptions({
                [this.type]: this.option.value
            })
        }
    },

    methods: {
        select (value) {
            this.$emit('select', value)
        }
    }
}
</script>
