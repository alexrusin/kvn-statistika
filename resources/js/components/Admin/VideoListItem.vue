<template>
    <tr class="cursor-pointer">
        <input v-if="isEditing.title"
            ref="title"
            v-model="video.title"
            type="text"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('title')"
        />
         <td v-else @click="editing('title')" class="p-3 px-5">{{ video.title }}</td>

         <input v-if="isEditing.youtube_id"
            ref="youtube_id"
            v-model="video.youtube_id"
            type="text"
            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 leading-tight outline-none bg-white border-gray-500 ml-2"
            @blur="update('youtube_id')"
        />
         <td v-else @click="editing('youtube_id')" class="p-3 px-5">{{ video.youtube_id }}</td>
    
        <td class="p-3 px-5 flex justify-end">
        <button
            type="button"
            @click="deleteVideo(item.id)"
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
                title: false,
                youtube_id: false,
            },
            video: this.item
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
            axios.put(`/admin/enter-data/videos/${this.video.id}`, this.video)
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
       deleteVideo(id) {
          axios.delete(`/admin/enter-data/videos/${id}`)
          .then(({data}) => {
              if (data.alertType == 'success') {
                  this.$emit('videoDeleted', id);
                  flash(data.message);
              }
          })
          .catch(error => {
              if (error.response.data.message) {
                  flash(error.response.data.message, error.response.data.alertType);
              } else {
                  flash('Невозможно удалить видео', 'danger');
              }
          })
      } 
    }
    
}
</script>