<template>
  <div>
    <div class="w-full px-4 mb-4">
      <form
        method="POST"
        action="/admin/enter-data/teams"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)"
      >
        <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full">
          <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
              <h3 class="py-4 text-xl font-semibold">Ввести команду</h3>
              <div class="mt-3">
                <button
                  type="submit"
                  class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded"
                >Ввести</button>
              </div>
            </div>
          </div>
          <div class="px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="flex flex-wrap mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-name"
                >Название</label>
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-name"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('name')"
                  v-text="form.errors.get('name')"
                ></p>
              </div>
               <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-city"
                >Город</label>
                <input
                  v-model="form.city"
                  type="text"
                  name="city"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-city"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('city')"
                  v-text="form.errors.get('city')"
                ></p>
              </div>
            </div>
            <div class="flex flex-wrap mb-2">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-image-url"
                >Фото (1280 x 720)</label>
                <input
                  v-model="form.image_url"
                  type="text"
                  name="image_url"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-image-url"
                  placeholder="https://i.ytimg.com/vi/tTxheXipdas/maxresdefault.jpg"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('image_url')"
                  v-text="form.errors.get('image_url')"
                ></p>
              </div>
               <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-rating"
                >Рейтинг</label>
                <input
                  v-model="form.rating"
                  type="number"
                  step="1"
                  min="1"
                  max="5"
                  name="rating"
                  placeholder="0"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-rating"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('rating')"
                  v-text="form.errors.get('rating')"
                ></p>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <teams-list-form :teams="teamsList" @teamDeleted="deleteTeam"></teams-list-form>
  </div>
</template>

<script>
import Form from "../utils/Form";
import TeamsListForm from "./TeamsListForm";
export default {
  components: { TeamsListForm },
  props: ["teams"],

  data() {
    return {
      teamsList: this.teams,
      form: new Form({
        name: "",
        city: "",
        image_url: "",
        rating: "",
      })
    };
  },

  methods: {
    onSubmit() {
      this.form
        .submit("post", "/admin/enter-data/teams")
        .then(data => {
          if(data.team) {
            this.teamsList.unshift(data.team);
          }
          flash(data.message, data.alertType);
        })
        .catch(errors => flash(errors.message, "danger"));
    },
    deleteTeam(id) {
      this.teamsList = this.teamsList.filter(team => team.id != id);
    }
  }
  
};
</script>