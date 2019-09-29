<template>
  <div>
    <div v-if="selectedTeams.length > 0 || isComparing" class="bg-teal-200 border-b">
      <div class="container mx-auto">
        <div class="flex justify-between px-6 -mb-px">
          <h3 class="py-4 text-xl font-semibold">Выберите команды</h3>
          <div class="mt-3">
            <button
              v-if="!isComparing"
              type="button"
              class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded"
              :class="selectedTeams.length <= 1 ? 'opacity-50 cursor-not-allowed' : ''"
              @click="compareTeams"
            >Сравнить</button>
            <button
              v-else
              type="button"
              class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded"
              @click="cancelCompare"
            >Очистить</button>
          </div>
        </div>
      </div>
    </div>

    <div class="flex flex-wrap -mx-1 lg:-mx-4">
      <team-card
        v-for="team in theTeams"
        :team="team"
        :key="team.id"
        :selected="teamSelected(team)"
        @selected="add"
        @deselected="remove"
      ></team-card>
    </div>
  </div>
</template>

<script>
import TeamCard from "./TeamCard";
export default {
  props: ["teams"],
  components: { TeamCard },
  data() {
    return {
      theTeams: this.teams,
      selectedTeams: [],
      isComparing: false
    };
  },

  methods: {
    compareTeams() {
      if (this.selectedTeams.length > 1) {
        this.isComparing = true;
        this.theTeams = this.selectedTeams;
        this.selectedTeams = [];
      }
    },

    cancelCompare() {
      this.theTeams = this.teams;
      this.isComparing = false;
    },

    teamSelected(team) {
      return this.selectedTeams.includes(team);
    },

    add(team) {
      if (this.selectedTeams.length < 3) {
        this.selectedTeams.push(team);
      }
    },

    remove(team) {
      this.selectedTeams = this.selectedTeams.filter(
        selectedTeam => selectedTeam.id != team.id
      );
    }
  }
};
</script>