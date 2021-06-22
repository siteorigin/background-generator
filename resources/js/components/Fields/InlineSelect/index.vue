<template>
    <div>
        <input
            v-model="search"
            type="search"
            class="p-2 rounded-t-md border border-gray-300 w-full h-10 block text-sm outline-none focus:outline-none focus:border-blue-600 transition duration-300"
            placeholder="Filter"
        >

        <ul class=" border-b border-l border-r border-gray-300 rounded-b-md h-137 overflow-y-scroll">
            <item
                v-for="(option, index) in filteredOptions"
                :key="index"
                :option="option"
                :value="value"
                :type="type"
                @select="select"
            />
        </ul>
    </div>
</template>

<script>
import Item from './Item'

export default {
    props: {
        value: {
            type: String|Number,
            default: null
        },
        type: {
            type: String,
            default: null
        },
        options: {
            type: Array,
            default: null,
            required: true
        }
    },

    components: {
        Item
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
            this.$emit('input', value)
        }
    }
}
</script>
