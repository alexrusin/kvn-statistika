<template>
  <div>
    <div v-if="teams.length === 0" class="flex flex-wrap my-2 -mx-1 lg:-mx-4">
      <div v-for="n in 6" :key="n" class="w-full px-1 my-2 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <div class="overflow-hidden bg-white rounded-lg shadow-lg animate-pulse">
          <div class="h-48 bg-gray-600"></div>
          <div class="p-6">
            <div class="block w-4/5 mt-4 text-transparent bg-gray-500 rounded">Название команды</div>
            <div class="block w-3/5 mt-4 text-transparent bg-gray-500 rounded">Эффективность</div>
            <div class="block w-3/5 mt-4 text-transparent bg-gray-500 rounded">Индекс Белого</div>
            <div class="block w-3/5 mt-4 text-transparent bg-gray-500 rounded">Народная оценка</div>
          </div>
        </div>
      </div>
    </div>
    <div v-else class="flex flex-wrap my-2 -mx-1 lg:-mx-4">
      <team-card
        v-for="team in theTeams"
        :team="team"
        :key="team.id"
        :selected="teamSelected(team)"
        @selected="add"
        @deselected="remove"
        @sign-in="show"
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
    <modal class="z-10" name="signInModal">
      <div class="flex justify-center mt-4">
        <div id="vk_auth"></div>
      </div>
    </modal>
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
      isComparing: false,
    };
  },

  created() {
    window.axios.get("/statistics/teams-data").then(({ data }) => {
      data = this.insertAds(data);
      this.theTeams = data;
      this.teams = data;
      this.sortTeams("desc");
    });

    window.events.$on("searchTeam", (teamSearch) => {
      if (!this.isComparing) {
        this.theTeams = this.teams.filter(
          (team) => {
            if (!team.name || !team.city) {
              return false;
            }
            return team.name.toLowerCase().includes(teamSearch.toLowerCase()) ||
            team.city.toLowerCase().includes(teamSearch.toLowerCase())
          }
        );
      }
    });

    window.events.$on("sortData", this.sortTeams);
  },

  methods: {
    show() {
      this.$modal.show('signInModal');
    },
    hide() {
      this.$modal.hide('signInModal');
    },
    sortTeams(sortType) {
      this.theTeams = this.removeAds(this.theTeams);
      this.theTeams = this.theTeams.sort((a, b) => {
        if (sortType === "desc") {
          return parseFloat(a.team_games_average.avg_okg) <
            parseFloat(b.team_games_average.avg_okg)
            ? 1
            : -1;
        } else {
          return parseFloat(a.team_games_average.avg_okg) >
            parseFloat(b.team_games_average.avg_okg)
            ? 1
            : -1;
        }
      });
      this.theTeams = this.insertAds(this.theTeams);
    },

    compareTeams() {
      if (this.selectedTeams.length > 1) {
        this.isComparing = true;
        this.theTeams = this.selectedTeams;
        this.selectedTeams = [];
        window.events.$emit("compareMode", true);
      }
    },

    cancelCompare() {
      this.theTeams = this.teams;
      this.isComparing = false;
      this.selectedTeams = [];
      window.events.$emit("compareMode", false);
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
        (selectedTeam) => selectedTeam.id != team.id
      );
    },

    insertAds(data) {
      data.splice(1, 0, {
        id:"kosykov-obzor",
        ad: true,
        ad_url: "https://www.youtube.com/watch?v=HwD6inyjHjg",
        image_url: "https://i.ytimg.com/vi/HwD6inyjHjg/hqdefault.jpg",
        text: "С Днём рождения, Денис! Желаем, чтобы твои обзоры всегда были такими же позитивными как и этот",
        callout_text: "Смотреть"
      });
      data.splice(6, 0, {
        id:"bezproduction",
        ad: true,
        ad_url: "https://www.youtube.com/watch?v=Xh1m2Eb1TZA",
        image_url: "https://i.ytimg.com/vi/Xh1m2Eb1TZA/hq720.jpg",
        text: "Пьяный КВН. Мы не пропагандируем алкоголь, мы пропагандируем веселье и математические задачки в начале каждого их выпуска",
        callout_text: "Смотреть"
      });
      return data;
    },
    
    removeAds(data) {
      return data.filter(item => !item.ad);
    }
  },
};
</script>