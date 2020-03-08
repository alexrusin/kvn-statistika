<template>
    <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full" :title="entry.title">
        <div class="border-b">
            <div class="px-6 -mb-px" v-if="isIndex">
                <a :href="'/blog/posts/' + entry.slug">
                    <h2 class="text-xl font-semibold my-3 text-blue-600" v-html="truncate(entry.title, 68)"></h2>
                </a>
            </div>
            <div class="px-6 -mb-px" v-else>
                <h2 class="text-xl font-semibold my-3" v-html="entry.title"></h2>
            </div>
        </div>
        <div class="px-8 pt-6 pb-8">
            <p v-if="isIndex" v-html="truncate(entry.body.replace(/(<([^>]+)>)/ig,''), 300)"></p>
            <p v-else v-html="entry.body"></p>
        </div>
        <div class="border-t">
            <div class="px-6 my-3">
                <div class="flex justify-between">
                    <div>
                       
                    </div>
                    <div>
                         <small class="text-light">
                            <span v-if="entry.published && !dateInTheFuture(entry.publish_date)">Опубликовано {{timeAgo(entry.publish_date)}}</span>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {dateInTheFuture, timeAgo, truncate} from '../../utils/functions';
export default {
    props: ['entry', 'isIndex'],
    data() {
        return {
            dateInTheFuture,
            timeAgo,
            truncate
        }
    }
}
</script>