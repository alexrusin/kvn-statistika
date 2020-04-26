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
        <td v-else @click="editingImage" class="p-3 px-5 truncate">{{ team.image_url }}</td>
        <modal :name="modalName">
            <image-picker :old-image-url="team.image_url" @image-link="insertImageLink"></image-picker>
        </modal>

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
import ImagePicker from "./ImagePicker"
export default {
    props: ['item'],
    components: { ImagePicker },
    data() {
        return {
            modalName: 'update-image-' + this.item.id,
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
        show () {
            this.$modal.show(this.modalName);
        },
        hide () {
            this.$modal.hide(this.modalName);
        },
        
        editing(property) {
            this.isEditing[property] = true;
            this.$nextTick(() => {
                this.$refs[property].focus();
            });
        },

        insertImageLink(link) {
            this.team.image_url = link;
            console.log(this.team.id);
            this.update('image_url');
            this.hide();
        },

        editingImage() {
            console.log(this.team.id);
            this.show();
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