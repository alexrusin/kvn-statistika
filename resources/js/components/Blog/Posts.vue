<template>
<div>
    <post v-for="blog in entries" :key="blog.slug" class="w-full my-4" :entry="blog"></post>
     <div class="mt-2">
      <paginator :data-set="dataSet" @changed="fetch"></paginator>
    </div>
</div>
</template>

<script>
import Post from './Post';
import Paginator from '../Paginator';
export default {
    components: { Post, Paginator },
    created() {
        this.fetch();
    },

    data() {
        return {
            entries: [],
            dataSet: false
        }
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
            this.entries = data.data;
            window.scrollTo(0, 0);
        }
    }
}
</script>