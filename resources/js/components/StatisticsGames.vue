<template>
    <div class="flex flex-wrap -mx-4">
        <statistics-game v-for="game in games" :game="game" :key="game.id"></statistics-game>
    </div>
</template>

<script>
    import StatisticsGame from './StatisticsGame';
    export default {
        props: ['games'],
        components: { StatisticsGame }
    }
</script>