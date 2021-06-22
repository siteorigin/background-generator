<template>
    <div class="mt-6">
        <h3 class="text-gray-1000 font-medium text-sm mb-3">
            {{ title }}
        </h3>
        <div class="flex items-center">
            <div class="relative flex-grow bg-gray-200 h-2 rounded-md">
                <input type="range" min="0" max="100" class="range" @input="update">
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

    computed: {
        progressPercent () {
            return this.value
        }
    },

    methods: {
        update (event) {
            this.$emit('input', event.target.value)
        }
    }
}
</script>

<style>
input[type=range] {
    -webkit-appearance: none;
    display: block;
    width: 100%;
    margin: 0;
    height: 11px;
}

input[type=range]:hover ~ div .thumb {
    --tw-border-opacity: 1;
    border-color: rgba(2, 132, 199, var(--tw-border-opacity));
}

input[type=range]::-moz-focus-outer {
    border: 0;
}

input[type=range] {
    display: block;
    height: 100%;
    position: absolute;
    width: 100%;
    z-index: 20;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
}

input[type=range] + div .thumb {
    top: 50%;
    transform: translateY(-50%);
    transition: .2s;
}

input[type=range]:focus {
    outline: none;
}

input[type=range]::-webkit-slider-runnable-track {
    width: 100%;
    height: 8px;
    cursor: pointer;
    background: transparent;
    border-radius: 0.375rem;
}

input[type=range]::-webkit-slider-thumb {
    cursor: pointer;
    -webkit-appearance: none;
    margin-top: -7px;
    width: 20px;
    height: 20px;
    background: transparent;
    border-radius: 59%;
    border: none;
    position: relative;
    z-index: 1;
    -webkit-transition: .2s;
    transition: .2s;
}

input[type=range]::-moz-range-track {
    width: 100%;
    height: 8px;
    cursor: pointer;
    background: transparent;
    border-radius: 6px;
}

input[type=range]::-moz-range-thumb {
    cursor: pointer;
    -webkit-appearance: none;
    margin-top: -14px;
    width: 15px;
    height: 15px;
    background: transparent;
    border-radius: 59%;
    border: none;
    position: relative;
    z-index: 2000;
    -moz-transition: .2s;
    transition: .2s;
}

input[type=range]::-ms-track {
    width: 100%;
    height: 8px;
    cursor: pointer;
    background: transparent;
    border-radius: 6px;
}

input[type=range]::-ms-fill-lower {
    background: transparent;
    border: none;
    border-radius: 2.6px;
}

input[type=range]::-ms-fill-upper {
    background: transparent;
    border: none;
    border-radius: 2.6px;
}

input[type=range]::-ms-thumb {
    cursor: pointer;
    -webkit-appearance: none;
    margin-top: -14px;
    width: 15px;
    height: 15px;
    background: transparent;
    border-radius: 59%;
    border: none;
    position: relative;
    z-index: 1;
    -ms-transition: .2s;
    transition: .2s;
}

input[type=range]:hover::-webkit-slider-thumb  {
    border: none;
}
</style>
