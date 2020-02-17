<template>
  <div>
    <div class="w-full px-4 my-4">
      <form
        method="POST"
        action="/admin/enter-data/results"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)"
        @change="form.errors.clear($event.target.name)"
      >
        <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full">
          <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
              <h3 class="py-4 text-xl font-semibold">Ввести результаты</h3>
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
                  for="grid-game-id"
                >Игра</label>
                <div class="relative">
                  <select
                    v-model="form.game_id"
                    name="game_id"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-game-id"
                  >
                    <option value>Выберите игру...</option>
                    <option
                      v-for="(game, id) in selectData.games"
                      :key="id"
                      :value="id"
                    >{{ game }}</option>
                  </select>
                  <div
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                  >
                    <svg
                      class="fill-current h-4 w-4"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                      />
                    </svg>
                  </div>
                </div>
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('game_id')"
                  v-text="form.errors.get('game_id')"
                ></p>
              </div>
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-team-id"
                >Команда</label>
                <div class="relative">
                  <select
                    v-model="form.team_id"
                    name="team_id"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-team-id"
                  >
                    <option value>Выберите команду...</option>
                    <option
                      v-for="(team, id) in selectData.teams"
                      :key="id"
                      :value="id"
                    >{{ team }}</option>
                  </select>
                  <div
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                  >
                    <svg
                      class="fill-current h-4 w-4"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                      />
                    </svg>
                  </div>
                </div>
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('team_id')"
                  v-text="form.errors.get('team_id')"
                ></p>
              </div>
            </div>
            <div class="flex flex-wrap mb-2">
              <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-okg"
                >ОКГ</label>
                <input
                  v-model="form.okg"
                  type="number"
                  step=".1"
                  min="0"
                  name="okg"
                  placeholder="0"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-okg"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('okg')"
                  v-text="form.errors.get('okg')"
                ></p>
              </div>
              <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-white-index"
                >Индекс Белого</label>
                <input
                  v-model="form.white_index"
                  type="number"
                  step=".1"
                  min="0"
                  name="white_index"
                  placeholder="0"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-white-index"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('white_index')"
                  v-text="form.errors.get('white_index')"
                ></p>
              </div>
              <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-efficiency"
                >Эффективность (%)</label>
                <input
                  v-model="form.efficiency"
                  type="number"
                  step=".1"
                  name="efficiency"
                  placeholder="0"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-efficiency"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('efficiency')"
                  v-text="form.errors.get('efficiency')"
                ></p>
              </div>
              <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-points"
                >Общий балл</label>
                <input
                  v-model="form.points"
                  type="number"
                  step=".1"
                  min="0"
                  name="points"
                  placeholder="0"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-points"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('points')"
                  v-text="form.errors.get('points')"
                ></p>
              </div>
            </div>
             <div class="flex flex-wrap mb-2">
              <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-time"
                >Время в игре (сек.)</label>
                <input
                  v-model="form.time"
                  type="number"
                  step="1"
                  name="time"
                  placeholder="0"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-time"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('time')"
                  v-text="form.errors.get('time')"
                ></p>
              </div>
              <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-peoples_points"
                >Народный балл (по <a href="https://www.youtube.com/playlist?list=PL5HiD4fCJJsD5P8uOKm3XxHsve5ner5Sm" target="_blank" class="text-blue-500">Veksadas</a>)</label>
                <input
                  v-model="form.peoples_points"
                  type="number"
                  step=".1"
                  min="0"
                  name="peoples_points"
                  placeholder="0"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-peoples_points"
                />
                <p
                  class="text-red-500 text-xs italic"
                  v-if="form.errors.has('peoples_points')"
                  v-text="form.errors.get('peoples_points')"
                ></p>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <results-list-form ref="resultsList"></results-list-form>
  </div>
</template>

<script>
import Form from "../../utils/Form";
import ResultsListForm from "./ResultsListForm";
export default {
  components: { ResultsListForm },
  props: ["selectData"],

  data() {
    return {
      form: new Form({
        game_id: "",
        team_id: "",
        okg: "",
        white_index: "",
        efficiency: "",
        points: "",
        time: "",
        peoples_points: ""
      })
    };
  },

  methods: {
    onSubmit() {
      if (this.form.efficiency) {
         this.form.efficiency = this.form.efficiency / 100;
      }
      this.form
        .submit("post", "/admin/enter-data/results")
        .then(data => {
          if (data.result) {
            this.$refs.resultsList.items.unshift(data.result);
          }
          flash(data.message, data.alertType);
        })
        .catch(errors => flash(errors.message, "danger"));
    }
  }
};
</script>