<template>
    <div class="flex flex-wrap -mx-1 lg:-mx-4">
        <team-card v-for="team in teams" :team="team" :key="team.id"></team-card>
    </div>
</template>

<script>
    import TeamCard from './TeamCard';
    export default {
        components: { TeamCard },
        data: () => ({
            teams: [
                {
                    id: 1,
                    imageUrl: 'https://i.ytimg.com/vi/nBLIKlCnFNM/maxresdefault.jpg',
                    city: "Сургут",
                    name: "Борцы. Северный десант",
                    okg: 5.5,
                    effectivness: 33,
                    white_index: 7,
                    rating: 5
                },
                {
                    id: 2,
                    imageUrl: 'https://i.ytimg.com/vi/j0e2ljr9iHs/maxresdefault.jpg',
                    city: "Тюмень",
                    name: "Наполеон динамит",
                    okg: 5.5,
                    effectivness: 33,
                    white_index: 7,
                    rating: 4
                },
                {
                    id: 3,
                    imageUrl: 'https://i.ytimg.com/vi/Li7OK9HhbzI/maxresdefault.jpg',
                    city: "Брюховецкая",
                    name: "Нате",
                    okg: 5.5,
                    effectivness: 33,
                    white_index: 7,
                    rating: 4
                },

                {
                    id: 4,
                    imageUrl: 'https://i.ytimg.com/vi/1cPHlpk5tos/maxresdefault.jpg',
                    city: "Красноярск",
                    name: "Так-то",
                    okg: 5.5,
                    effectivness: 33,
                    white_index: 7,
                    rating: 4
                },
                {
                    id: 5,
                    imageUrl: 'https://i.ytimg.com/vi/8fZrbWjGKos/maxresdefault.jpg',
                    city: "Липецк",
                    name: "Громокошки",
                    okg: 5.5,
                    effectivness: 33,
                    white_index: 7,
                    rating: 4
                }
            ]
        })
    }
</script>