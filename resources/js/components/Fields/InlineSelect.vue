<template>
    <div>
        <input
            v-model="search"
            type="search"
            class="p-2 rounded-t-md border border-gray-300 w-full h-10 block text-sm outline-none focus:outline-none focus:border-blue-600 transition duration-300"
            placeholder="Filter"
        >
        <ul class=" border-b border-l border-r border-gray-300 rounded-b-md h-137 overflow-y-scroll">
            <li
                v-for="(option, index) in filteredOptions"
                :key="index"
                class="text-sm p-2 hover:bg-blue-50 transition duration-300 cursor-pointer"
                :class="{'bg-blue-100': modelValue === option.value}"
                @click="select(option.value)"
            >
                {{ option.label }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        modelValue: {
            default: null
        },
        options: {
            type: Object,
            default: null,
            required: true
        }
    },

    data: () => ({
        search: ''
    }),

    computed: {
        filteredOptions () {
            return this.options.filter(option => {
                if (!this.search) {
                    return true
                }
                const base = option.label.toLowerCase()
                return base.search(this.search.toLowerCase()) > -1
            })
        }
    },

    methods: {
        select (value) {
            this.$emit('update:modelValue', value)
        }
    }
}
</script>
