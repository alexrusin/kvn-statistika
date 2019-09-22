<template>
  <div class="w-full px-4 mb-4">
    <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full">
      <div class="border-b">
        <div class="flex justify-between px-6 -mb-px">
          <h3 class="py-4 text-xl font-semibold">Комманды</h3>
          <div class="mt-3"></div>
        </div>
      </div>
      <div class="px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
          <tbody>
            <tr class="border-b">
              <th class="text-left p-3 px-5">Название</th>
              <th class="text-left p-3 px-5">Город</th>
              <th class="text-left p-3 px-5">Рейтинг</th>
              <th></th>
            </tr>
            <tr
              v-for="team in teams"
              :key="team.id"
              class="border-b hover:bg-orange-100 bg-gray-100"
            >
              <td class="p-3 px-5">{{ team.name }}</td>
              <td class="p-3 px-5 truncate">{{ team.city }}</td>
              <td class="p-3 px-5">{{ team.rating}}</td>
              <td class="p-3 px-5 flex justify-end">
                <button
                  type="button"
                  @click="deleteTeam(team.id)"
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
import Form from "../utils/Form";
export default {
  props: ["teams"],

  methods: {
      deleteTeam(id) {
          axios.delete(`/admin/enter-data/teams/${id}`)
          .then(({data}) => {
              if (data.alertType == 'success') {
                  this.$emit('teamDeleted', id);
                  flash(data.message);
              }
          })
          .catch(error => {
              if (error.response.data.message) {
                  flash(error.response.data.message, error.response.data.alertType);
              } else {
                  flash('Невозможно удалить команду', 'danger');
              }
          })
      }
  }
};
</script>