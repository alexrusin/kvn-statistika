<template>
  <div class="w-full px-4 mb-4">
    <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full">
      <div class="border-b">
        <div class="flex justify-between px-6 -mb-px">
          <h3 class="py-4 text-xl font-semibold">Игры</h3>
          <div class="mt-3"></div>
        </div>
      </div>
      <div class="px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <table class="w-full text-md bg-white shadow-md rounded mb-4 table-fixed">
          <tbody>
            <tr class="border-b">
              <th class="text-left p-3 px-5">Название</th>
              <th class="text-left p-3 px-5">Марфин</th>
              <th class="text-left p-3 px-5">Эффективность</th>
              <th></th>
            </tr>
            <game-list-item
              v-for="game in games"
              :key="game.id"
              :item="game"
              class="border-b hover:bg-orange-100 bg-gray-100"
              @gameDeleted="deleteGame"
            >
            </game-list-item>
          </tbody>
        </table>
      </div>
    </div>
    <div class="mt-2">
      <paginator :data-set="dataSet" @changed="fetch"></paginator>
    </div>
  </div>
</template>

<script>
import Paginator from '../Paginator';
import GameListItem from './GameListItem';

export default {
  components: { Paginator, GameListItem },

  created() {
    this.fetch();
  },

  data() {
    return {
        dataSet: false,
        games: []
    };
  },

  methods: {
      fetch(page) {
        axios.get(this.url(page)).then(this.refresh);
    },

    url(page) {
        if (!page) {

            let query = location.search.match(/page=(\d+)/);

            page = query ? query[1] : 1;
        }

        return `${location.pathname}?page=${page}`;
    },

    refresh({data}) {
        this.dataSet = data;
        this.games = data.data;
        window.scrollTo(0, 0);
    },

    deleteGame(id) {
      this.games = this.games.filter(game => game.id != id);
    }
  }
};
</script>