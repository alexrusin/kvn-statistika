<template>
    <tr class="cursor-pointer">
        <input v-if="isEditing.name"
            ref="name"
            v-model="team.name"
            type="text"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('name')"
        />
        <td v-else @click="editing('name')" class="p-3 px-5">{{ team.name }}</td>

        <input v-if="isEditing.city"
            ref="city"
            v-model="team.city"
            type="text"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('city')"
        />
        <td v-else @click="editing('city')" class="p-3 px-5 truncate">{{ team.city }}</td>


        <input v-if="isEditing.image_url"
            ref="image_url"
            v-model="team.image_url"
            type="text"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('image_url')"
        />
        <td v-else @click="editing('image_url')" class="p-3 px-5 truncate">{{ team.image_url }}</td>

        <input v-if="isEditing.rating"
            ref="rating"
            v-model="team.rating"
            type="text"
            class="appearance-none block w-32 text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('rating')"
        />
        <td v-else @click="editing('rating')" class="p-3 px-5 truncate">{{ team.rating }}</td>

        <td class="p-3 px-5 flex justify-end">
        <button
            type="button"
            @click="deleteTeam(team.id)"
            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none"
        >Delete</button>
        </td>
    </tr>
</template>

<script>
export default {
    props: ['item'],
    data() {
        return {
            isEditing: {
                name: false,
                city: false,
                image_url: false,
                rating: false
            },
            team: this.item
        };
    },
    methods: {
        editing(property) {
            this.isEditing[property] = true;
            this.$nextTick(() => {
                this.$refs[property].focus();
            })
            

        },
        update(property) {
            this.isEditing[property] = false;
            axios.put(`/admin/enter-data/teams/${this.team.id}`, this.team)
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
          });
      } 
    }

}
</script>