<template>
 <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
    <div class="bg-white rounded-lg overflow-hidden shadow-lg">
        <div class="pb-2/3">
            <img class="h-full w-full object-cover" :src="team.imageUrl" :alt="team.name">
        </div>
        <div class="p-6">
            <div class="flex items-baseline">
                <div class="text-gray-600 text-xs uppercase font-semibold tracking-wide">
                    г. {{ team.city }}
                </div>
            </div>
            <h4 class="mt-1 font-semibold text-lg leading-tight truncate">{{ team.name }}</h4>
            <div class="mt-1">
                ОКГ: {{ team.okg }} 
            </div>
            <div class="mt-1">
                Эффективность: {{ team.effectivness }}%
            </div>
            <div class="mt-1">
                Индекс Белого: {{ team.white_index }} 
            </div>
            <div class="mt-2 flex items-center">
                Рейтинг: &nbsp;
                <svg v-for="i in 5" :key="i" :class="i <= team.rating ? 'text-teal-500' : 'text-gray-400'" class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M10 1.3l2.388 6.722H18.8l-5.232 3.948 1.871 6.928L10 14.744l-5.438 4.154 1.87-6.928-5.233-3.948h6.412L10 1.3z"/>
                </svg>
            </div>
            </div>
    </div>
 </div>
</template>

<script>
export default {
    props: ['team']
}
</script>