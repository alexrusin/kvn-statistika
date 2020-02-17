<template>
    <tr>
        <td class="p-3 px-5">{{ item.game.display_name }}</td>
        <td class="p-3 px-5">{{ item.team.name }}</td>
        <td class="p-3 px-5">{{ displayAverage(item.okg) }}</td>
        <td class="p-3 px-5">{{ displayAverage(item.white_index) }}</td>
        <td class="p-3 px-5">{{ displayPercentage(item.efficiency)}}%</td>
        <td class="p-3 px-5">{{ item.time ? item.time : 'N/A'}}</td>
        <td class="p-3 px-5">{{ displayAverage(item.points) }}</td>
        <td class="p-3 px-5">{{ displayAverage(item.peoples_points) }}</td>
        <td class="p-3 px-5 flex justify-end">
        <button
            type="button"
            @click="deleteResult(item.id)"
            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
        >Delete</button>
        </td>
    </tr>
</template>

<script>
import { displayPercentage, displayAverage } from "../../utils/functions";
export default {
    props: ['item'],
    data() {
        return {
            displayPercentage,
            displayAverage
        }
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
}
</script>