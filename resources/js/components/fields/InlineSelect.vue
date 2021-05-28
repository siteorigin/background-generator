<template>
    <div>
        <input type="search"
               class="p-2 rounded-t-md border border-gray-300 w-full h-10 block text-sm outline-none focus:outline-none focus:border-blue-600 transition duration-300"
               v-model="value"
               placeholder="Filter"
        >
        <ul class=" border-b border-l border-r border-gray-300 rounded-b-md h-137 overflow-y-scroll">
            <li v-for="(item, index) in filtered"
                :key="index"
                class="text-sm p-2 hover:bg-blue-50 transition duration-300 cursor-pointer"
                :class="{'bg-blue-100': selected === item}"
                @click="selected = item"
            >
                {{ item }}
            </li>
        </ul>
    </div>
</template>

<script>
 export default {
     props: {
         options: {
             type: Object,
             default: null,
             required: true
         }
     },
     data: () => ({
         value: '',
         selected: ''
     }),
     computed: {
         filtered() {
             if(!this.value) {
                 return this.options
             }
             return this.options.filter(item => item.toLowerCase().includes(this.value.toLowerCase()))
         }
     }
 }
</script>
