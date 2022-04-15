<template>
    <div class="p-4 sm:p-8">
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-xl text-gray-900 font-medium">
                Background Generator Help
            </h2>
            <button @click.prevent="close" class="focus:outline-none">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path
                        d="M13.7 0.3C13.3 -0.1 12.7 -0.1 12.3 0.3L7 5.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L5.6 7L0.3 12.3C-0.1 12.7 -0.1 13.3 0.3 13.7C0.5 13.9 0.7 14 1 14C1.3 14 1.5 13.9 1.7 13.7L7 8.4L12.3 13.7C12.5 13.9 12.8 14 13 14C13.2 14 13.5 13.9 13.7 13.7C14.1 13.3 14.1 12.7 13.7 12.3L8.4 7L13.7 1.7C14.1 1.3 14.1 0.7 13.7 0.3Z"
                        fill="#212121"
                    />
                </svg>
            </button>
        </div>

        <p class="text-gray-900 mb-6">Create background patterns for your website or graphic design project.</p>

        <ul class="list-disc list-inside text-gray-900">
            <li class="mb-3">Use the <strong>Color</strong> setting to select your base color.</li>
            <li class="mb-3">Use the <strong>Pattern</strong> column on the left to select your background pattern.</li>
            <li class="mb-3">Use the <strong>Overlay</strong> column on the right to select your background overlay filter.</li>
            <li class="mb-3">The <strong>Invert</strong> toggle switch inverts the pattern and overlay colors.</li>
            <li class="mb-3">Adjust your chosen pattern with the <strong>Pattern Intensity</strong> setting.</li>
            <li class="mb-3">Adjust your chosen overlay filter with the <strong>Noise</strong> setting.</li>
            <li class="mb-3">Ready to use your background image? Click the <strong>Download image</strong> button to download a 150 x 150 PNG image.</li>
            <li class="mb-3">Click the <strong>@2x</strong> button to download a 300 x 300 PNG version.</li>
            <li class="mb-3">Use the Saved Steps section to take a snapshot of your settings. Click the + icon to take a snapshot; a pattern image will be added to the Saved Steps section. 
            Click on the pattern image to load the saved settings. Hover over the pattern image and click the remove icon to remove the snapshot.</li>
        </ul>
    </div>
</template>

<script>
import YoutubePlayer from '../YoutubePlayer'

export default {
    components: {
        YoutubePlayer
    },

    data: () => ({
        isPlaying: false
    }),

    methods: {
        close () {
            this.$modal.hide('help')
        },
        play () {
            this.$refs.video.play()
            this.isPlaying = true
        }
    }
}
</script>
