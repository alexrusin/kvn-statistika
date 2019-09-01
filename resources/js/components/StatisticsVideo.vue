<template>
    <div class="w-full lg:w-1/2 px-4 mt-4">
        <div class="bg-white border-t border-b sm:rounded sm:border shadow">
            <div class="border-b">
                <div class="px-6 -mb-px">
                    <h3 class="py-4 font-normal text-lg">{{ video.title }}</h3>
                </div>
            </div>
            <div class="flex justify-around px-6 py-4">
                <div class="iframe-container">
                <iframe width="560" height="315" :src="`https://www.youtube.com/embed/${video.youtube_id}`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['video']
}
</script>