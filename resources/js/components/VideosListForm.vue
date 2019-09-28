<template>
  <div class="w-full px-4 mb-4">
    <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full">
      <div class="border-b">
        <div class="flex justify-between px-6 -mb-px">
          <h3 class="py-4 text-xl font-semibold">Видео</h3>
          <div class="mt-3"></div>
        </div>
      </div>
      <div class="px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
          <tbody>
            <tr class="border-b">
              <th class="text-left p-3 px-5">Название</th>
              <th class="text-left p-3 px-5">YouTube ID</th>
              <th></th>
            </tr>
            <tr
              v-for="video in videos"
              :key="video.id"
              class="border-b hover:bg-orange-100 bg-gray-100"
            >
              <td class="p-3 px-5">{{ video.title }}</td>
              <td class="p-3 px-5 truncate">{{ video.youtube_id}}</td>
              <td class="p-3 px-5 flex justify-end">
                <button
                  type="button"
                  @click="deleteVideo(video.id)"
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
export default {
  props: ["videos"],

  methods: {
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
};
</script>