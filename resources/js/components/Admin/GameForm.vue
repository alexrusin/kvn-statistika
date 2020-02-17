<template>
  <div>
    <div class="w-full px-4 my-4">
      <form
        method="POST"
        action="/admin/enter-data/games"
        @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)"
        @change="form.errors.clear($event.target.name)"
      >
        <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full">
          <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
              <h3 class="py-4 text-xl font-semibold">Ввести игру</h3>
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
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-tournament-round"
                >Турнирный круг</label>
                <div class="relative">
                  <select
                    v-model="form.tournament_round"
                    name="tournament_round"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-tournament-round"
                  >
                    <option value>Выберите круг...</option>
                    <option
                      v-for="(round, index) in selectData.rounds"
                      :key="index"
                      :value="index"
                    >{{ round }}</option>
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
                  v-if="form.errors.has('tournament_round')"
                  v-text="form.errors.get('tournament_round')"
                ></p>
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-round-stage"
                >Стадия</label>
                <div class="relative">
                  <select
                    v-model="form.round_stage"
                    name="round_stage"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-round-stage"
                  >
                    <option value>Выберите стадию...</option>
                    <option
                      v-for="(stage, index) in selectData.stages"
                      :key="index"
                      :value="index"
                    >{{ stage }}</option>
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
                  v-if="form.errors.has('round_stage')"
                  v-text="form.errors.get('round_stage')"
                ></p>
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-division"
                >Лига</label>
                <div class="relative">
                  <select
                    v-model="form.division"
                    name="division"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-division"
                  >
                    <option value>Выберите лигу...</option>
                    <option
                      v-for="(division, index) in selectData.divisions"
                      :key="index"
                      :value="index"
                    >{{ division }}</option>
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
                  v-if="form.errors.has('division')"
                  v-text="form.errors.get('division')"
                ></p>
              </div>
            </div>
            <div class="flex flex-wrap mb-2">
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-season"
                >Сезон</label>
                <div class="relative">
                  <select
                    v-model="form.season"
                    name="season"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-season"
                  >
                    <option value>Выберите год...</option>
                    <option
                      v-for="(year, index) in selectData.seasons"
                      :key="index"
                      :value="index"
                    >{{ year }}</option>
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
                  v-if="form.errors.has('season')"
                  v-text="form.errors.get('season')"
                ></p>
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-marfin"
                >Статистическая оценка (Марфин)</label>
                <input
                  v-model="form.marfin"
                  type="number"
                  step=".1"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-marfin"
                  placeholder="0"
                />
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-efficiency"
                >Эффективность (%)</label>
                <input
                  v-model="form.efficiency"
                  type="number"
                  step=".1"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-efficiency"
                  placeholder="0"
                />
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <games-list-form ref="gamesList"></games-list-form>
  </div>
</template>

<script>
import Form from "../../utils/Form";
import GamesListForm from "./GamesListForm";
export default {
  components: { GamesListForm },
  props: ["selectData"],

  data() {
    return {
      form: new Form({
        season: "",
        division: "",
        tournament_round: "",
        round_stage: "",
        efficiency: "",
        marfin: ""
      })
    };
  },

  methods: {
    onSubmit() {
      if (this.form.efficiency) {
         this.form.efficiency = this.form.efficiency / 100;
      }
      this.form
        .submit("post", "/admin/enter-data/games")
        .then(data => {
          if(data.game) {
            this.$refs.gamesList.games.unshift(data.game);
          }
          flash(data.message, data.alertType);
        })
        .catch(errors => flash(errors.message, "danger"));
    },
    deleteGame(id) {
      this.gamesList = this.gamesList.filter(game => game.id != id);
    }
  }
  
};
</script>