<template>
 <div class="w-full px-1 my-2 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
    <div class="overflow-hidden bg-white rounded-lg shadow-lg">
        <a :href="ad.ad_url" target="_blank">
            <div class="relative pb-2/3 card-image">
                <img class="object-cover w-full h-full" :src="ad.image_url">
            </div>
        </a>
        <div class="p-6">
            <p>{{ad.text}}</p>
            <div class="mt-6 text-center">
                <a :href="ad.ad_url" target="_blank" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-blue-500 border-4 border-blue-500 rounded hover:bg-blue-700 hover:border-blue-700">Смотреть</a>
            </div>
        </div>
    </div>
 </div>
</template>

<script>
export default {
    props: ['ad']
}
</script>

<style type="text/css">
.card-image {
    height: 14em;
}
</style>