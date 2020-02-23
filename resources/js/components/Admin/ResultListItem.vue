<template>
    <tr>
        <td class="p-3 px-5">{{ result.game.display_name }}</td>
        <td class="p-3 px-5">{{ result.team.name }}</td>
        <input v-if="isEditing.okg"
            ref="okg"
            v-model="result.okg"
            type="number"
            step=".1"
            min="0"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('okg')"
        />
        <td v-else @click="editing('okg')" class="p-3 px-5">{{ displayAverage(result.okg) }}</td>
        
        <input v-if="isEditing.white_index"
            ref="white_index"
            v-model="result.white_index"
            type="number"
            step=".1"
            min="0"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('white_index')"
        />
        <td v-else @click="editing('white_index')" class="p-3 px-5">{{ displayAverage(result.white_index) }}</td>
        
        <input v-if="isEditing.efficiency"
            ref="efficiency"
            v-model="result.efficiency"
            type="number"
            step=".1"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('efficiency')"
        />
        <td v-else @click="editing('efficiency')" class="p-3 px-5">{{ displayPercentage(result.efficiency)}}%</td>
        
        <input v-if="isEditing.time"
            ref="time"
            v-model="result.time"
            type="number"
            step="1"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('time')"
        />
        <td v-else @click="editing('time')" class="p-3 px-5">{{ result.time ? result.time : 'N/A'}}</td>
        
        <input v-if="isEditing.points"
            ref="points"
            v-model="result.points"
            type="number"
            step=".1"
            min="0"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('points')"
        />
        <td v-else @click="editing('points')" class="p-3 px-5">{{ displayAverage(result.points) }}</td>
        
        <input v-if="isEditing.peoples_points"
            ref="peoples_points"
            v-model="result.peoples_points"
            type="number"
            step=".1"
            min="0"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('peoples_points')"
        />
        <td v-else @click="editing('peoples_points')" class="p-3 px-5">{{ displayAverage(result.peoples_points) }}</td>
        
        <td class="p-3 px-5 flex justify-end">
        <button
            type="button"
            @click="deleteResult(item.id)"
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
                okg: false,
                white_index: false,
                efficiency: false,
                time: false,
                points: false,
                peoples_points: false
            },
            result: this.item
        }
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
            axios.put(`/admin/enter-data/results/${this.result.id}`, this.result)
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