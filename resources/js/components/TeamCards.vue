<template>
  <div>
    <div class="flex flex-wrap my-2 -mx-1 lg:-mx-4">
      <team-card
        v-for="team in theTeams"
        :team="team"
        :key="team.id"
        :selected="teamSelected(team)"
        @selected="add"
        @deselected="remove"
      ></team-card>
    </div>
    <div
     v-if="selectedTeams.length > 0 || isComparing"
      class="p-4 bg-teal-200 border-b alert-flash"
    >
      <div class="flex">
        <div class="py-2 mr-3 font-semibold" v-if="!isComparing">Выберите команды</div>
        <div>
        <button
              v-if="!isComparing"
              type="button"
              class="flex-shrink-0 px-2 py-1 text-sm text-white bg-blue-500 border-4 border-blue-500 rounded hover:bg-blue-700 hover:border-blue-700"
              :class="selectedTeams.length <= 1 ? 'opacity-50 cursor-not-allowed' : ''"
              @click="compareTeams"
            >Сравнить</button>
            <button
              v-else
              type="button"
              class="flex-shrink-0 px-2 py-1 text-sm text-white bg-blue-500 border-4 border-blue-500 rounded hover:bg-blue-700 hover:border-blue-700"
              @click="cancelCompare"
            >Очистить</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TeamCard from "./TeamCard";
export default {
  components: { TeamCard },
  data() {
    return {
      theTeams: [],
      teams: [],
      selectedTeams: [],
      isComparing: false
    };
  },

  created() {
    window.axios.get('/statistics/teams-data')
      .then(({data}) => {
        this.theTeams = data;
        this.teams = data;
        this.sortTeams('desc');
      });
    

    window.events.$on('searchTeam', teamSearch => {
      if (!this.isComparing) {
        this.theTeams = this.teams.filter(team => team.name.toLowerCase().includes(teamSearch.toLowerCase()) || team.city.toLowerCase().includes(teamSearch.toLowerCase()));
      }
    });

    window.events.$on('sortData', this.sortTeams);
  },

  methods: {
    sortTeams(sortType) {
      this.theTeams = this.theTeams.sort((a, b) => {
          if (sortType === 'desc') {
              return parseFloat(a.team_games_average.avg_okg) < parseFloat(b.team_games_average.avg_okg) ? 1 : -1;
          } else {
              return parseFloat(a.team_games_average.avg_okg) > parseFloat(b.team_games_average.avg_okg) ? 1 : -1;
          }
      });
    },

    compareTeams() {
      if (this.selectedTeams.length > 1) {
        this.isComparing = true;
        this.theTeams = this.selectedTeams;
        this.selectedTeams = [];
        window.events.$emit('compareMode', true);
      }
    },

    cancelCompare() {
      this.theTeams = this.teams;
      this.isComparing = false;
      this.selectedTeams = [];
      window.events.$emit('compareMode', false);
    },

    teamSelected(team) {
      return this.selectedTeams.includes(team);
    },

    add(team) {
      if (this.isComparing) {
        return;
      }
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