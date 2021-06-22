<template>
    <li
        class="text-sm p-2 hover:bg-blue-50 transition duration-300 cursor-pointer flex items-center"
        :class="{'bg-blue-100': value === option.value}"
        @click="select(option.value)"
    >
        <img v-lazy="backgroundUrl" class="w-5 h-5 mr-3" :alt="option.label"/>
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
