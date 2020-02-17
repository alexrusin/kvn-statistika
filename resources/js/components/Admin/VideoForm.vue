<template>
  <div>
    <div class="w-full px-4 my-4">
      <form
        method="POST"
        action="/admin/enter-data/videos"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)"
      >
        <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full">
          <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
              <h3 class="py-4 text-xl font-semibold">Ввести видео</h3>
              <div class="mt-3">
                <button
                  type="submit"
                  class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded"
                >Ввести</button>
              </div>
            </div>
          </div>
          <div class="px-8 pt-6 pb-8 mb-4 flex flex-col my-6">
            <div class="flex flex-wrap mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-title"
                >Название</label>
                <input
                  v-model="form.title"
                  type="text"
                  name="title"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-title"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('title')"
                  v-text="form.errors.get('title')"
                ></p>
              </div>
               <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-youtube_id"
                >YouTube ID</label>
                <input
                  v-model="form.youtube_id"
                  type="text"
                  name="youtube_id"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-youtube_id"
                  placeholder="MXHLTLVnD7Q"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('youtube_id')"
                  v-text="form.errors.get('youtube_id')"
                ></p>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <videos-list-form ref="videosList"></videos-list-form>
  </div>
</template>

<script>
import Form from "../../utils/Form";
import VideosListForm from "./VideosListForm";
export default {
  components: { VideosListForm },

  data() {
    return {
      form: new Form({
        title: "",
        youtube_id: ""
      })
    };
  },

  methods: {
    onSubmit() {
      this.form
        .submit("post", "/admin/enter-data/videos")
        .then(data => {
          if(data.video) {
            this.$refs.videosList.items.unshift(data.video);
          }
          flash(data.message, data.alertType);
        })
        .catch(errors => flash(errors.message, "danger"));
    }
  }
  
};
</script>