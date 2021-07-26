<template>
  <div>
    <button
      type="button"
      class="
        flex-shrink-0
        px-2
        py-1
        text-sm text-white
        bg-blue-500
        rounded
        hover:bg-blue-700
      "
      @click="reviewTeam"
    >
      Оценить
    </button>
    <modal class="z-10" :name="modalName">
      <div v-if="signedIn">
        <div class="flex justify-center mb-4">
          <p class="text-lg md:text-xl font-semibold">
            Оцените команду {{ name }}
          </p>
        </div>

        <label
          class="
            block
            uppercase
            tracking-wide
            text-gray-700 text-xs
            font-bold
            mb-2
          "
          :for="'review-' + id"
          >Комментарий</label
        >
        <textarea
          v-model="reviewBody"
          placeholder="Если хотите, можете оставить комментарий"
          type="text"
          class="
            appearance-none
            block
            w-full
            bg-gray-200
            text-gray-700
            border border-gray-200
            rounded
            py-3
            px-4
            leading-tight
            focus:outline-none
            focus:bg-white
            focus:border-gray-500
          "
          :id="'review-' + id"
          rows="8"
        />
        <div class="flex justify-end">{{ reviewBodyLength }} / 500</div>

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
            class="
              flex-shrink-0
              px-2
              py-1
              text-base text-white
              bg-blue-500
              rounded
              hover:bg-blue-700
            "
            :class="
              reviewRating === 0 ? 'cursor-not-allowed' : 'cursor-pointer'
            "
            :disabled="reviewRating === 0 ? true : false"
            @click="saveReview"
          >
            Сохранить
          </button>
        </div>
      </div>
      <div v-else class="flex justify-center mt-4">
        <div id="vk_auth"></div>
      </div>
      <!-- <div v-else class="flex justify-center mt-4">Please, sign in</div> -->

    </modal>
  </div>
</template>

<script>
export default {
  props: ['id', 'name'],
  computed: {
    reviewBodyLength() {
      return this.reviewBody.length;
    },
  },
  data() {
    return {
      modalName: "rate-team-" + this.id,
      reviewBody: "",
      reviewRating: 0,
    };
  },
  methods: {
    reviewTeam() {
      this.show();
    },
    saveReview() {
      axios
        .post(`/api/reviews/${this.id}`, {
          body: this.reviewBody,
          rating: this.reviewRating,
        })
        .then(({ data }) => {
          flash(data.message, data.alertType);
          this.$emit('team-reviewed')
          this.hide();
        })
        .catch((error) => {
          flash("Произошла ошибка. Попробуйте ещё раз", "danger");
        });
    },
    show() {
      this.$modal.show(this.modalName);
      if (this.reviewRating === 0 && this.signedIn) {
        axios
          .get(`/api/reviews/user/${this.id}`)
          .then(({ data }) => {
            this.reviewBody = data.review.body ? data.review.body : "";
            this.reviewRating = data.review.rating;
          })
          .catch((error) => {
            if (error.response.status !== 404) {
              console.log(error);
            }
          });
      }
    },
    hide() {
      this.$modal.hide(this.modalName);
    },
  },
};
</script>
