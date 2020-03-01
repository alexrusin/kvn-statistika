<template>
<div>
    <post v-for="blog in entries" :key="blog.slug" class="w-full my-4" :entry="blog" :is-index="true"></post>     
</div>
</template>

<script>
import {dateInTheFuture, timeAgo, truncate} from '../../utils/functions';
import Post from './Post';
export default {
    components: { Post },
    props: ['postsPaginator'],
    created() {
        this.entries = this.postsPaginator.data
    },

    data() {
        return {
            entries: '',
            timeAgo,
            dateInTheFuture,
            truncate
        }
    },

    methods: {
        
    }
}
</script>