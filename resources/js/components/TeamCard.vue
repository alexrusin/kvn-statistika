<template>
  <div class="w-full px-1 my-2 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
    <div v-if="team.ad" class="overflow-hidden bg-white rounded-lg shadow-lg">
      <div
        @click="openAdLink(team.ad_url, team.id)"
        class="relative cursor-pointer pb-2/3 card-image"
      >
        <img class="object-cover w-full h-full" :src="team.image_url" />
      </div>
      <div class="p-6">
        <p>{{ team.text }}</p>
        <div class="mt-6 text-center">
          <button
            @click="openAdLink(team.ad_url, team.id)"
            class="flex-shrink-0 px-2 py-1 text-sm text-white bg-blue-500 border-4 border-blue-500 rounded hover:bg-blue-700 hover:border-blue-700"
          >
            {{ team.callout_text }}
          </button>
        </div>
      </div>
    </div>
    <div v-else class="overflow-hidden bg-white rounded-lg shadow-lg">
      <div
        class="relative cursor-pointer pb-2/3 card-image"
        @click="teamClicked"
      >
        <img
          class="object-cover w-full h-full"
          :class="selected ? 'opacity-50' : 'opacity-100'"
          :src="team.image_url"
          :alt="team.name"
        />
        <svg
          v-if="selected"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          class="absolute w-6 text-gray-800 fill-current position-check"
        >
          <path
            d="M8.294 16.998c-.435 0-.847-.203-1.111-.553L3.61 11.724a1.392 1.392 0 0 1 .27-1.951 1.392 1.392 0 0 1 1.953.27l2.351 3.104 5.911-9.492a1.396 1.396 0 0 1 1.921-.445c.653.406.854 1.266.446 1.92L9.478 16.34a1.39 1.39 0 0 1-1.12.656c-.022.002-.042.002-.064.002z"
          />
        </svg>
        <svg
          v-if="!selected"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          class="absolute w-8 position-check"
        >
          <rect
            width="10"
            height="10"
            style="
              fill: rgba(255, 255, 255, 0.75);
              stroke-width: 1;
              stroke: rgb(21, 22, 25);
            "
          />
        </svg>
      </div>
      <div class="p-6">
        <div class="flex items-baseline">
          <div
            class="text-xs font-semibold tracking-wide text-gray-600 uppercase truncate"
          >
            г. {{ team.city }}
          </div>
        </div>
        <h4 class="mt-1 text-lg font-semibold leading-tight truncate">
          {{ team.name }}
        </h4>
        <div class="relative mt-1">
          ОКГ: {{ this.okg }}
          <span class="text-sm text-gray-600"> / игру </span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            class="inline w-4 ml-1 text-teal-700 cursor-pointer fill-current"
            @click="toggleTooltip('showOkgTooltip')"
          >
            <path
              d="M10 .4A9.6 9.6 0 0 0 .4 10a9.6 9.6 0 1 0 19.2-.001C19.6 4.698 15.301.4 10 .4zm-.151 15.199h-.051c-.782-.023-1.334-.6-1.311-1.371.022-.758.587-1.309 1.343-1.309l.046.002c.804.023 1.35.594 1.327 1.387-.023.76-.578 1.291-1.354 1.291zm3.291-6.531c-.184.26-.588.586-1.098.983l-.562.387c-.308.24-.494.467-.563.688-.056.174-.082.221-.087.576v.09H8.685l.006-.182c.027-.744.045-1.184.354-1.547.485-.568 1.555-1.258 1.6-1.287a1.65 1.65 0 0 0 .379-.387c.225-.311.324-.555.324-.793 0-.334-.098-.643-.293-.916-.188-.266-.545-.398-1.061-.398-.512 0-.863.162-1.072.496-.216.341-.325.7-.325 1.067v.092H6.386l.004-.096c.057-1.353.541-2.328 1.435-2.897.563-.361 1.264-.544 2.081-.544 1.068 0 1.972.26 2.682.772.721.519 1.086 1.297 1.086 2.311-.001.567-.18 1.1-.534 1.585z"
            />
          </svg>
          <tooltip transition="fade" :show="showOkgTooltip"
            >Относительный коэффициент Гуликова (ОКГ - смешных минут в
            выступлении) = эффективность * время</tooltip
          >
        </div>

        <div class="relative mt-1">
          Эффективность: {{ this.efficiency }}%
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            class="inline w-4 ml-1 text-teal-700 cursor-pointer fill-current"
            @click="toggleTooltip('showEfficiencyTooltip')"
          >
            <path
              d="M10 .4A9.6 9.6 0 0 0 .4 10a9.6 9.6 0 1 0 19.2-.001C19.6 4.698 15.301.4 10 .4zm-.151 15.199h-.051c-.782-.023-1.334-.6-1.311-1.371.022-.758.587-1.309 1.343-1.309l.046.002c.804.023 1.35.594 1.327 1.387-.023.76-.578 1.291-1.354 1.291zm3.291-6.531c-.184.26-.588.586-1.098.983l-.562.387c-.308.24-.494.467-.563.688-.056.174-.082.221-.087.576v.09H8.685l.006-.182c.027-.744.045-1.184.354-1.547.485-.568 1.555-1.258 1.6-1.287a1.65 1.65 0 0 0 .379-.387c.225-.311.324-.555.324-.793 0-.334-.098-.643-.293-.916-.188-.266-.545-.398-1.061-.398-.512 0-.863.162-1.072.496-.216.341-.325.7-.325 1.067v.092H6.386l.004-.096c.057-1.353.541-2.328 1.435-2.897.563-.361 1.264-.544 2.081-.544 1.068 0 1.972.26 2.682.772.721.519 1.086 1.297 1.086 2.311-.001.567-.18 1.1-.534 1.585z"
            />
          </svg>
          <tooltip transition="fade" :show="showEfficiencyTooltip"
            >Зашедшие шутки/все шутки</tooltip
          >
        </div>
        <div class="relative mt-1">
          Индекс Белого: {{ this.whiteIndex }}
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            class="inline w-4 ml-1 text-teal-700 cursor-pointer fill-current"
            @click="toggleTooltip('showWhiteTooltip')"
          >
            <path
              d="M10 .4A9.6 9.6 0 0 0 .4 10a9.6 9.6 0 1 0 19.2-.001C19.6 4.698 15.301.4 10 .4zm-.151 15.199h-.051c-.782-.023-1.334-.6-1.311-1.371.022-.758.587-1.309 1.343-1.309l.046.002c.804.023 1.35.594 1.327 1.387-.023.76-.578 1.291-1.354 1.291zm3.291-6.531c-.184.26-.588.586-1.098.983l-.562.387c-.308.24-.494.467-.563.688-.056.174-.082.221-.087.576v.09H8.685l.006-.182c.027-.744.045-1.184.354-1.547.485-.568 1.555-1.258 1.6-1.287a1.65 1.65 0 0 0 .379-.387c.225-.311.324-.555.324-.793 0-.334-.098-.643-.293-.916-.188-.266-.545-.398-1.061-.398-.512 0-.863.162-1.072.496-.216.341-.325.7-.325 1.067v.092H6.386l.004-.096c.057-1.353.541-2.328 1.435-2.897.563-.361 1.264-.544 2.081-.544 1.068 0 1.972.26 2.682.772.721.519 1.086 1.297 1.086 2.311-.001.567-.18 1.1-.534 1.585z"
            />
          </svg>
          <tooltip transition="fade" :show="showWhiteTooltip"
            >Равномерность распределения шуток среди участников одной команды. 6
            - линия стендапа</tooltip
          >
        </div>
        <div class="relative mt-1">
          Народная оценка: {{ this.peoplesPoints }}
          <span class="text-sm text-gray-600"> / игру </span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            class="inline w-4 ml-1 text-teal-700 cursor-pointer fill-current"
            @click="toggleTooltip('showPeoplesPointsTooltip')"
          >
            <path
              d="M10 .4A9.6 9.6 0 0 0 .4 10a9.6 9.6 0 1 0 19.2-.001C19.6 4.698 15.301.4 10 .4zm-.151 15.199h-.051c-.782-.023-1.334-.6-1.311-1.371.022-.758.587-1.309 1.343-1.309l.046.002c.804.023 1.35.594 1.327 1.387-.023.76-.578 1.291-1.354 1.291zm3.291-6.531c-.184.26-.588.586-1.098.983l-.562.387c-.308.24-.494.467-.563.688-.056.174-.082.221-.087.576v.09H8.685l.006-.182c.027-.744.045-1.184.354-1.547.485-.568 1.555-1.258 1.6-1.287a1.65 1.65 0 0 0 .379-.387c.225-.311.324-.555.324-.793 0-.334-.098-.643-.293-.916-.188-.266-.545-.398-1.061-.398-.512 0-.863.162-1.072.496-.216.341-.325.7-.325 1.067v.092H6.386l.004-.096c.057-1.353.541-2.328 1.435-2.897.563-.361 1.264-.544 2.081-.544 1.068 0 1.972.26 2.682.772.721.519 1.086 1.297 1.086 2.311-.001.567-.18 1.1-.534 1.585z"
            />
          </svg>
          <tooltip transition="fade" :show="showPeoplesPointsTooltip"
            >По данным Народного Судейства
            <a
              href="https://www.youtube.com/channel/UCtCoIu-usWXeHe1uaohUkPA"
              target="_blank"
              class="text-blue-500"
              >VeksadaS</a
            ></tooltip
          >
        </div>
        <div class="mt-1">
          Оценка жюри: {{ this.points }}
          <span class="text-sm text-gray-600"> / игру </span>
        </div>
        <div class="flex justify-between mt-2">
          <div class="flex items-center">
            Рейтинг: &nbsp;
            <svg
              v-for="i in 5"
              :key="i"
              :class="i <= rating ? 'text-teal-500' : 'text-gray-400'"
              class="w-4 h-4 fill-current"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M10 1.3l2.388 6.722H18.8l-5.232 3.948 1.871 6.928L10 14.744l-5.438 4.154 1.87-6.928-5.233-3.948h6.412L10 1.3z"
              />
            </svg>
          </div>
          <button
            type="button"
            class="flex-shrink-0 px-2 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-700"
            @click="show"
          >
            Оценить
          </button>
        </div>
      </div>
    </div>
    <modal class="z-10" :name="modalName">
      <div v-if="signedIn">
        <div class="flex justify-center mb-4">
           <p class="text-lg md:text-xl font-semibold">Оцените команду {{team.name}}</p>
        </div>
       
        <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          :for="'review-' + team.id"
          >Комментарий</label
        >
        <textarea
          v-model="reviewBody"
          type="text"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          :id="'review-' + team.id"
          rows="8"
        />

        <div class="flex justify-center mt-8">
          <svg
              v-for="i in 5"
              :key="i"
              :class="i <= reviewRating ? 'text-teal-500' : 'text-gray-400'"
              class="w-8 h-8 fill-current cursor-pointer"
              @click="reviewRating = i"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M10 1.3l2.388 6.722H18.8l-5.232 3.948 1.871 6.928L10 14.744l-5.438 4.154 1.87-6.928-5.233-3.948h6.412L10 1.3z"
              />
            </svg>
        </div>
        <div class="flex justify-center mt-10">
          <button
            type="button"
            class="flex-shrink-0 px-2 py-1 text-base text-white bg-blue-500 rounded hover:bg-blue-700"
            :class="reviewRating === 0 ? 'cursor-not-allowed' : 'cursor-pointer'"
            :disabled="reviewRating === 0 ? true : false"
          >
            Сохранить
          </button>
        </div>
      </div>
      <div v-else class="flex justify-center mt-4">
        <div id="vk_auth"></div>
      </div>
    </modal>
  </div>
</template>

<script>
export default {
  props: ["team", "selected"],
  computed: {
    efficiency() {
      return (this.team.team_games_average.avg_efficiency * 100)
        .toFixed(1)
        .replace(".", ",");
    },

    okg() {
      return (this.team.team_games_average.avg_okg * 1)
        .toFixed(1)
        .replace(".", ",");
    },

    whiteIndex() {
      return (this.team.team_games_average.avg_white_index * 1)
        .toFixed(1)
        .replace(".", ",");
    },

    points() {
      return (this.team.team_games_average.avg_points * 1)
        .toFixed(1)
        .replace(".", ",");
    },

    peoplesPoints() {
      return (this.team.team_games_average.avg_peoples_points * 1)
        .toFixed(1)
        .replace(".", ",");
    },

    rating() {
      if (!this.team.team_games_average || !this.team.team_games_average.avg_time) {
        return this.team.rating;
      }
      let rating = Math.round(
        ((this.team.team_games_average.avg_okg * 60) /
          this.team.team_games_average.avg_time) *
          8
      );
      if (rating > 5) return 5;
      return rating;
    },
  },

  data() {
    return {
      tooltips: [
        "showOkgTooltip",
        "showWhiteTooltip",
        "showEfficiencyTooltip",
        "showPeoplesPointsTooltip",
      ],
      showOkgTooltip: false,
      showWhiteTooltip: false,
      showEfficiencyTooltip: false,
      showPeoplesPointsTooltip: false,
      modalName: "rate-team-" + this.team.id,

      reviewBody: "",
      reviewRating: 0,
    };
  },

  methods: {
    redirect() {
      window.location.href =
        "/vk/login?uid=557024042&first_name=Alexey&last_name=Rusin&photo=https://sun6-20.userapi.com/s/v1/ig2/7EK2bOVz7oRbbdfKwlwEjPEyQu_izDuShXn2vcJAyS8GPbdZapr-eYiaHx2dm_EZwi2zeHlxxseQLpsDlFT2Jukg.jpg%3Fsize=200x0%26amp;quality=96%26amp;crop=76,254,262,262%26amp;ava=1&photo_rec=https://sun6-20.userapi.com/s/v1/ig2/rTioLXBzFGUpNhNaXAaekTIA1Qqq8sHVJc3d-OHXMajI0pnaBCOGQ09R9vqotv5eYvv9d-jfnvcnIS-LtEG7yRAK.jpg%3Fsize=50x0%26amp;quality=96%26amp;crop=91,268,210,210%26amp;ava=1&hash=a35be5f1887e338530bc71be54f22f3c";
    },
    show() {
      this.$modal.show(this.modalName);
    },
    hide() {
      this.$modal.hide(this.modalName);
    },
    toggleTooltip(tooltip) {
      if (this[tooltip] === true) {
        this[tooltip] = false;
      } else {
        this.tooltips.forEach((tip) => (this[tip] = false));
        this[tooltip] = true;
      }
    },

    teamClicked() {
      if (this.selected) {
        this.$emit("deselected", this.team);
      } else {
        this.$emit("selected", this.team);
      }
    },

    openAdLink(link, eventCategory) {
      window.captureOutboundLink(link, eventCategory);
    },
  },
};
</script>

<style type="text/css" scoped>
.position-check {
  top: 3%;
  left: 2%;
}

.card-image {
  height: 14em;
}
</style>