<template>
    <beat-loader v-if="!teamGames" :loading="!teamGames" :color="'#4299e1'" class="flex justify-center mt-10"></beat-loader>
    <div v-else>
       
        <p v-if="gamesErrorMessage" class="flex justify-center mt-8">{{gamesErrorMessage}}</p>
       
        <div v-else class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <team-game v-for="teamGame in teamGames" :key="teamGame.id" :team-game="teamGame"></team-game>
        </div>
    </div>
    
</template>

<script>
    import TeamGame from './TeamGame.vue'
    import BeatLoader from "vue-spinner/src/BeatLoader.vue";
    export default {
        components: {TeamGame, BeatLoader},
        props: ['id'],
        created() {
            axios.get(`/statistics/teams/${this.id}/games`)
                .then(({data}) => {
                    this.teamGames = data
                })
                .catch(error => {
                    if (error.response) {
                        this.gamesErrorMessage = error.response.data.message;
                    } else {
                        this.gamesErrorMessage = 'В данное время игры не доступны'
                    }
                })
        },

        data() {
            return {
                teamGames: undefined,
                gamesErrorMessage: ''
            }
        }
    }
</script>