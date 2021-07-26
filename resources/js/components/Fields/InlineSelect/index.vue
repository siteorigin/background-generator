<template>
    <div class="mb-6 sm:mb-12">
        <div class="relative h-10 mb-3">
            <img src="/images/search.svg" class="absolute left-3 top-3">
            <input
                v-model="search"
                type="search"
                class="w-full h-full pl-9 pr-2 placeholder-gray-200 border border-gray-400 rounded focus:outline-none hover:border-blue-200 focus:border-blue-200 transition duration-200"
                :placeholder="placeholder"
            >
        </div>

        <simplebar data-simplebar-auto-hide="false" class="h-464 pr-5 -mr-5">
            <ul ref="container" class="list">
                <item
                    v-for="(option, index) in filteredOptions"
                    :key="index"
                    :ref="option.value === value ? 'selected' : null"
                    :option="option"
                    :value="value"
                    :type="type"
                    :color="color"
                    @select="select"
                />
            </ul>
        </simplebar>
    </div>
</template>

<script>
import Item from './Item'

import simplebar from 'simplebar-vue';

const SCROLL_OFFSET = 256

export default {
    props: {
        value: {
            type: String | Number,
            default: null
        },
        type: {
            type: String,
            default: null
        },
        color: {
            type: String,
            default: null
        },
        options: {
            type: Array,
            default: null,
            required: true
        },
        placeholder: {
            type: String,
            default: null
        }
    },

    components: {
        Item,
        simplebar
    },

    data: () => ({
        search: ''
    }),

    created () {
        this.unwatchIsLiveProp = this.$watch('value', (value) => {
            if (value) {
                this.$nextTick(this.scrollToSelected)
                this.unwatchIsLiveProp()
            }
        })
    },

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
        },
        scrollToSelected () {
            const selectedItem = this.$refs.selected

            if (selectedItem) {
                const el = selectedItem[0].$el
                this.$refs.container.scrollTop = el.offsetTop - SCROLL_OFFSET
            }
        }
    }
}
</script>
