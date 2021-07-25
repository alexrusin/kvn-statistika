<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
       <team-game v-for="index in 7" :key="index"></team-game>
    </div>
</template>

<script>
    import TeamGame from './TeamGame.vue'
    export default {
        components: {TeamGame}
    }
</script>