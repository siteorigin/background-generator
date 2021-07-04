<template>
    <div class="relative mb-6 aspect-w-16 aspect-h-9">
        <iframe
            v-if="showPlayer"
            :src="iframeUrl"
            class="w-full h-full"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
        />

        <template v-else>
            <img
                :src="`https://i.ytimg.com/vi/${videoId}/maxresdefault.jpg`"
                alt="Play"
            />
            <button
                class="absolute left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2 w-auto h-auto focus:outline-none"
                @click="play"
            >
                <svg
                    width="96"
                    height="96"
                    viewBox="0 0 96 96"
                    fill="none"
                    class="text-white hover:text-gray-50 transition duration-200"
                >
                    <circle cx="48" cy="48" r="48" fill="CurrentColor" />
                    <path
                        d="M64.8 48.4001L40 63.2001L40 33.6001L64.8 48.4001Z"
                        fill="#1F2B31"
                    />
                </svg>
            </button>
        </template>
    </div>
</template>

<script>
const YOUTUBE_SETTINGS = {
    autoplay: 1,
    enablejsapi: 1,
    autohide: 2,
    border: 0
}

export default {
    props: {
        videoId: {
            type: String
        }
    },

    data: () => ({
        showPlayer: false
    }),

    computed: {
        iframeUrl () {
            const query = new URLSearchParams(YOUTUBE_SETTINGS).toString()
            return `https://www.youtube.com/embed/${this.videoId}?${query}`
        }
    },

    methods: {
        play () {
            this.showPlayer = true
        }
    }
}
</script>
