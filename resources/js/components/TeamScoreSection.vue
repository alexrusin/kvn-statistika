<template>
  <div class="mt-4 text-center">
    <beat-loader
      v-if="scoreIsLoading"
      class="flex justify-center"
      :loading="true"
      size="18px"
      :color="'#4299e1'"
    ></beat-loader>
    <div v-else>
      <p v-if="noScore">Поставьте первую оценку команде</p>
      <p v-else>Зрительская оценка: {{ score }} / 5,00 ({{ votes }} чел.)</p>
      <div class="flex justify-center mt-2">
        <review-team
          :id="id"
          name="name"
          @team-reviewed="getTeamScore"
        ></review-team>
      </div>
    </div>
  </div>
</template>

<script>
import BeatLoader from "vue-spinner/src/BeatLoader.vue";
export default {
  components: { BeatLoader },
  props: ["id", "name"],
  created() {
    this.getTeamScore();
  },

  data() {
    return {
      noScore: false,
      scoreIsLoading: false,
      score: "",
      votes: "",
    };
  },

  methods: {
    getTeamScore() {
      this.scoreIsLoading = true;
      axios.get(`/statistics/teams/${this.id}/score`).then(({ data }) => {
        this.scoreIsLoading = false;
        if (data.length === 0) {
          this.noScore = true;
          return;
        }
        this.score = parseFloat(data[0].average).toFixed(2).replace(".", ",");
        this.votes = data[0].votes;
      });
    },
  },
};
</script>

