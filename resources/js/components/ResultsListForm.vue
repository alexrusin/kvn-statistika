<template>
  <div class="w-full px-4 mb-4">
    <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full">
      <div class="border-b">
        <div class="flex justify-between px-6 -mb-px">
          <h3 class="py-4 text-xl font-semibold">Результаты</h3>
          <div class="mt-3"></div>
        </div>
      </div>
      <div class="px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
          <tbody>
            <tr class="border-b">
              <th class="text-left p-3 px-5">Игра</th>
              <th class="text-left p-3 px-5">Команда</th>
              <th class="text-left p-3 px-5">ОКГ</th>
              <th class="text-left p-3 px-5">И. Б.</th>
              <th class="text-left p-3 px-5">Эффект. (%)</th>
              <th class="text-left p-3 px-5">Время</th>
              <th class="text-left p-3 px-5">Суд. балл</th>
              <th class="text-left p-3 px-5">Народный балл</th>
              <th></th>
            </tr>
            <tr
              v-for="result in results"
              :key="result.id"
              class="border-b hover:bg-orange-100 bg-gray-100"
            >
              <td class="p-3 px-5">{{ result.game.display_name }}</td>
              <td class="p-3 px-5">{{ result.team.name }}</td>
              <td class="p-3 px-5">{{ displayAverage(result.okg) }}</td>
              <td class="p-3 px-5">{{ displayAverage(result.white_index) }}</td>
              <td class="p-3 px-5">{{ displayPercentage(result.efficiency)}}%</td>
              <td class="p-3 px-5">{{ result.time ? result.time : 'N/A'}}</td>
              <td class="p-3 px-5">{{ displayAverage(result.points) }}</td>
              <td class="p-3 px-5">{{ displayAverage(result.peoples_points) }}</td>
              <td class="p-3 px-5 flex justify-end">
                <button
                  type="button"
                  @click="deleteResult(result.id)"
                  class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                >Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { displayPercentage, displayAverage } from "../utils/functions";
export default {
  props: ["results"],

  data() {
    return {
        displayPercentage,
        displayAverage
    };
  },

  methods: {
      deleteResult(id) {
          axios.delete(`/admin/enter-data/results/${id}`)
          .then(({data}) => {
              if (data.alertType == 'success') {
                  this.$emit('resultDeleted', id);
                  flash(data.message);
              }
          })
          .catch(error => {
              if (error.response.data.message) {
                  flash(error.response.data.message, error.response.data.alertType);
              } else {
                  flash('Невозможно удалить результат', 'danger');
              }
          })
      }
  }
};
</script>