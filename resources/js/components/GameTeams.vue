<template>
    <div>
     <div class="text-md font-bold text-gray-800 text-sm sm:text-lg">
        <span class="uppercase truncate">{{ game.display_name }}</span>
      </div>
      <div v-if="teams.length > 0" class="flex items-center justify-center">
        <div class="container">
          <table
            class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5"
          >
            <thead class="text-white">       
              <tr v-for="index in teams.length" :key="index"
                class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
              >
                <th class="p-1 sm:p-3 text-left text-sm sm:text-lg">Команда</th>
                <th class="p-1 sm:p-3 text-left text-sm sm:text-lg">ОКГ</th>
                <th class="p-1 sm:p-3 text-left truncate hidden sm:table-cell text-sm sm:text-lg">Эффективность</th>
                <th class="p-1 sm:p-3 text-left truncate hidden sm:table-cell text-sm sm:text-lg">Народный балл</th>
                <th class="p-1 sm:p-3 text-left truncate text-sm sm:text-lg">Балл жюри</th>
              </tr>
            </thead>
            <tbody class="flex-1 sm:flex-none">
              <tr v-for="team in teams" :key="team.id"
              class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                <td class="border-grey-light border hover:bg-gray-100 p-1 sm:p-3 truncate text-sm sm:text-lg">{{ team.team.name }} </td>
                <td class="border-grey-light border hover:bg-gray-100 p-1 sm:p-3 truncate text-sm sm:text-lg">{{ displayAverage(team.okg) }} </td>
                <td
                  class="border-grey-light border hover:bg-gray-100 p-1 sm:p-3 truncate hidden sm:table-cell text-sm sm:text-lg"
                >{{ displayPercentage(team.efficiency) }}%</td>
                 <td
                  class="border-grey-light border hover:bg-gray-100 p-1 sm:p-3 truncate hidden sm:table-cell text-sm sm:text-lg"
                >{{ displayAverage(team.peoples_points) }}</td>
                 <td
                  class="border-grey-light border hover:bg-gray-100 p-1 sm:p-3 truncate text-sm sm:text-lg"
                >{{ displayAverage(team.points) }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div v-else class="text-center text-2xl">Нет данных</div>
    </div>
</template>

<script>
import { displayPercentage, displayAverage } from "../utils/functions";
export default {
    props: ['game'],
    created() {
        axios.get(`/statistics/game/${this.game.id}/teams`)
            .then(({data}) => this.teams = data);
    },

    data() {
        return {
            teams: [],
            displayPercentage,
            displayAverage
        };
    }
}
</script>

<style scoped type="text/css">
@media (min-width: 640px) {
  table {
    display: inline-table !important;
  }

  thead tr:not(:first-child) {
    display: none;
  }
}

td:not(:last-child) {
  border-bottom: 0;
}

th:not(:last-child) {
  border-bottom: 2px solid rgba(0, 0, 0, 0.1);
}
</style>