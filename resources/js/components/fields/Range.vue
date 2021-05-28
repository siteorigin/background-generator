<template>
    <div class="mt-6">
        <h3 class="text-gray-1000 font-medium text-sm mb-3">{{ title }}</h3>
        <div class="flex items-center">
            <div class="relative flex-grow bg-gray-200 h-2 rounded-md">
                <input type="range" v-model="range" min="0" max="50" class="range">
                <div class="relative" :style="{'width': progressPercent + '%'}">
                    <span class="block border-sm bg-blue-500 h-2 rounded-md w-full"></span>
                    <span class="block rounded-full bg-white shadow-sm border border-gray-400 absolute w-5 h-5 right-0 -mr-2 thumb"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true
        },
        value: {
            default: null
        }
    },
    data () {
        return {
            range: this.$props.value
        }
    },
    computed: {
        progressPercent () {
            return this.range * 100 / 50
        }
    }
}
</script>
