<template>
    <div class="flex flex-wrap -mx-4">
        <statistics-video v-for="video in videos" :video="video" :key="video.id"></statistics-video>
    </div>
</template>

<script>
    import StatisticsVideo from './StatisticsVideo';
    export default {
        props: ['videos'],
        components: { StatisticsVideo }
    }
</script>