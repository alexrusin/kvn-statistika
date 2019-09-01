<template>
    <div class="flex flex-wrap -mx-4">
        <statistics-video v-for="video in videos" :video="video" :key="video.id"></statistics-video>
    </div>
</template>

<script>
    import StatisticsVideo from './StatisticsVideo';
    export default {
        components: { StatisticsVideo },
        data: () => ({
            videos: [
                {
                    id: 1,
                    title: 'КВН статистика (экспресс). Первая 1/2 Премьер-лиги 2019',
                    youtube_id: 'Ic9IzEURPrk'
                },
                {
                    id: 2,
                    title: 'КВН статистика (экспресс). Вторая 1/4 Премьер-лиги 2019',
                    youtube_id: '-y8YCBjxjLk'
                },
                {
                    id: 3,
                    title: 'КВН статистика (экспресс). Первая 1/4 Премьер-лиги 2019',
                    youtube_id: '1XKejPGnW9A'
                },

                {
                    id: 4,
                    title: 'КВН статистика. Итоги этапа 1/8 Премьер-лиги 2019',
                    youtube_id: 'jLENN1IHfuo'
                },
                {
                    id: 5,
                    title: 'КВН статистика. Итоги этапа 1/4 Высшей лиги 2019',
                    youtube_id: 'gTvixJ-fA8A'
                }
            ]
        })
    }
</script>