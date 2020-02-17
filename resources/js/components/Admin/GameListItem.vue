<template>
    <tr>
        <td class="p-3 px-5">{{ game.display_name }}</td>
        <td class="p-3 px-5">{{ displayAverage(game.marfin) }}</td>
        <td class="p-3 px-5">{{ displayPercentage(game.efficiency)}}%</td>
        <td class="p-3 px-5 flex justify-end">
        <button
            type="button"
            @click="deleteGame(game.id)"
            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
        >Delete</button>
        </td>
    </tr>
</template>

<script>
import { displayPercentage, displayAverage } from "../../utils/functions";
export default {
    props: ['game'],
    data() {
        return {
            displayPercentage,
            displayAverage,
        };
    },
    methods: {
       deleteGame(id) {
          axios.delete(`/admin/enter-data/games/${id}`)
          .then(({data}) => {
              if (data.alertType == 'success') {
                  this.$emit('gameDeleted', id);
                  flash(data.message);
              }
          })
          .catch(error => {
              if (error.response.data.message) {
                  flash(error.response.data.message, error.response.data.alertType);
              } else {
                  flash('Невозможно удалить игру', 'danger');
              }
          })
      } 
    }
}
</script>