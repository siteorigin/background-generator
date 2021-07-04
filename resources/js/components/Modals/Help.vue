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

        <youtube-player video-id="tT0pQYaTrrM" />

        <p class="text-gray-900">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
            commodo libero sapien, quis ultrices erat ultrices quis. Nam vel ex
            ut metus congue vehicula. Vivamus commodo sem mauris, ullamcorper
            imperdiet diam pretium in. Sed vitae neque imperdiet quam dictum
            ornare non vitae arcu. Donec ligula massa, placerat ut gravida non,
            venenatis in elit. Suspendisse nec ante imperdiet arcu ornare
            convallis et eget ipsum. Phasellus lorem nisi, volutpat vitae turpis
            et, egestas vulputate nulla. Aenean quis leo at ante rhoncus
            volutpat. Nam fringilla bibendum neque eu luctus. Sed eget laoreet
            est. Praesent pulvinar pharetra ante, non pellentesque mauris
            aliquam ut. Curabitur vel lorem orci. Nunc finibus tempor arcu,
            molestie vehicula nibh vestibulum eu.
            <br /><br />
            Nunc justo mauris, porta ac elementum sed, porta ac dolor. Duis
            risus magna, sodales et pretium eu, ornare sed magna. Suspendisse
            sed euismod nunc. Nam quam nibh, molestie ut purus sit amet,
            porttitor bibendum enim. Etiam imperdiet egestas mi sit amet
            blandit. Vivamus ultrices sagittis justo at fermentum. Curabitur
            facilisis sodales justo, ut semper tellus bibendum iaculis. Duis
            convallis feugiat magna eget sodales. Pellentesque quis ipsum quis
            risus bibendum ullamcorper. Proin sem enim, eleifend et orci at,
            tincidunt iaculis augue. Nullam sit amet fringilla nibh.
        </p>
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
