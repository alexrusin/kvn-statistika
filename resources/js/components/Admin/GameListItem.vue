<template>
    <tr>
        <td class="p-3 px-5">{{ game.display_name }}</td>

        <input v-if="isEditing.marfin"
            ref="marfin"
            v-model="game.marfin"
            type="number"
            step=".1"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('marfin')"
        />
        <td v-else @click="editing('marfin')" class="p-3 px-5 cursor-pointer">{{ displayAverage(game.marfin) }}</td>

        <input v-if="isEditing.efficiency"
            ref="efficiency"
            v-model="game.efficiency"
            type="number"
            step=".1"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('efficiency')"
        />
        <td v-else @click="editing('efficiency')" class="p-3 px-5 cursor-pointer">{{ displayPercentage(game.efficiency)}}%</td>
        <td class="p-3 px-5 flex justify-end">
        <button
            type="button"
            @click="deleteGame(item.id)"
            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none"
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
            displayAverage,
            isEditing: {
                marfin: false,
                efficiency: false
            },
            game: this.item
        };
    },
    methods: {
        editing(property) {
            this.isEditing[property] = true;
            this.$nextTick(() => {
                this.$refs[property].focus();
            });
        },
        update(property) {
            this.isEditing[property] = false;
            axios.put(`/admin/enter-data/games/${this.game.id}`, this.game)
          .then(({data}) => {
              if (data.alertType == 'success') {
                  flash(data.message);
              }              
          })
          .catch(error => {
              if (error.response.data.message) {
                  flash(error.response.data.message, error.response.data.alertType);
              } else {
                  flash('Невозможно обновить данные', 'danger');
              }
          });
        },
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