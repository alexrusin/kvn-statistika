<template>
    <div class="flex flex-wrap -mx-1 lg:-mx-4">
        <team-card v-for="team in teams" :team="team" :key="team.id"></team-card>
    </div>
</template>

<script>
    import TeamCard from './TeamCard';
    export default {
        props: ['teams'],
        components: { TeamCard }
    }
</script>