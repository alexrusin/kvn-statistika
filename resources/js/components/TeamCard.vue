<template>
 <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
    <div class="bg-white rounded-lg overflow-hidden shadow-lg">
        <div class="pb-2/3 relative cursor-pointer" @click="teamClicked">
            <img class="h-full w-full object-cover" :class="selected ? 'opacity-50' : 'opacity-100'" :src="team.image_url" :alt="team.name">
            <svg v-if="selected" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-6 absolute position-check fill-current text-gray-800">
                <path d="M8.294 16.998c-.435 0-.847-.203-1.111-.553L3.61 11.724a1.392 1.392 0 0 1 .27-1.951 1.392 1.392 0 0 1 1.953.27l2.351 3.104 5.911-9.492a1.396 1.396 0 0 1 1.921-.445c.653.406.854 1.266.446 1.92L9.478 16.34a1.39 1.39 0 0 1-1.12.656c-.022.002-.042.002-.064.002z"/>
            </svg>
        </div>
        <div class="p-6">
            <div class="flex items-baseline">
                <div class="text-gray-600 text-xs uppercase font-semibold tracking-wide truncate">
                    г. {{ team.city }}
                </div>
            </div>
            <h4 class="mt-1 font-semibold text-lg leading-tight truncate">{{ team.name }}</h4>
            <div class="mt-1 relative" >
                ОКГ: {{ this.okg }} 
                <span class="text-gray-600 text-sm"> / игру </span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-4 inline cursor-pointer fill-current text-teal-700 ml-1" @click="toggleTooltip('showOkgTooltip')">
                    <path d="M10 .4A9.6 9.6 0 0 0 .4 10a9.6 9.6 0 1 0 19.2-.001C19.6 4.698 15.301.4 10 .4zm-.151 15.199h-.051c-.782-.023-1.334-.6-1.311-1.371.022-.758.587-1.309 1.343-1.309l.046.002c.804.023 1.35.594 1.327 1.387-.023.76-.578 1.291-1.354 1.291zm3.291-6.531c-.184.26-.588.586-1.098.983l-.562.387c-.308.24-.494.467-.563.688-.056.174-.082.221-.087.576v.09H8.685l.006-.182c.027-.744.045-1.184.354-1.547.485-.568 1.555-1.258 1.6-1.287a1.65 1.65 0 0 0 .379-.387c.225-.311.324-.555.324-.793 0-.334-.098-.643-.293-.916-.188-.266-.545-.398-1.061-.398-.512 0-.863.162-1.072.496-.216.341-.325.7-.325 1.067v.092H6.386l.004-.096c.057-1.353.541-2.328 1.435-2.897.563-.361 1.264-.544 2.081-.544 1.068 0 1.972.26 2.682.772.721.519 1.086 1.297 1.086 2.311-.001.567-.18 1.1-.534 1.585z"/>
                </svg>
                <tooltip transition="fade" :show="showOkgTooltip">Относительный коэффициент Гуликова (ОКГ - смешных минут в выступлении) = эффективность * время</tooltip>
            </div>
           
            <div class="mt-1 relative">
                Эффективность: {{ this.efficiency }}%
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-4 inline cursor-pointer fill-current text-teal-700 ml-1" @click="toggleTooltip('showEfficiencyTooltip')">
                    <path d="M10 .4A9.6 9.6 0 0 0 .4 10a9.6 9.6 0 1 0 19.2-.001C19.6 4.698 15.301.4 10 .4zm-.151 15.199h-.051c-.782-.023-1.334-.6-1.311-1.371.022-.758.587-1.309 1.343-1.309l.046.002c.804.023 1.35.594 1.327 1.387-.023.76-.578 1.291-1.354 1.291zm3.291-6.531c-.184.26-.588.586-1.098.983l-.562.387c-.308.24-.494.467-.563.688-.056.174-.082.221-.087.576v.09H8.685l.006-.182c.027-.744.045-1.184.354-1.547.485-.568 1.555-1.258 1.6-1.287a1.65 1.65 0 0 0 .379-.387c.225-.311.324-.555.324-.793 0-.334-.098-.643-.293-.916-.188-.266-.545-.398-1.061-.398-.512 0-.863.162-1.072.496-.216.341-.325.7-.325 1.067v.092H6.386l.004-.096c.057-1.353.541-2.328 1.435-2.897.563-.361 1.264-.544 2.081-.544 1.068 0 1.972.26 2.682.772.721.519 1.086 1.297 1.086 2.311-.001.567-.18 1.1-.534 1.585z"/>
                </svg>
                <tooltip transition="fade" :show="showEfficiencyTooltip">Зашедшие шутки/все шутки</tooltip>
            </div>
            <div class="mt-1 relative">
                Индекс Белого: {{ this.whiteIndex }}
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-4 inline cursor-pointer fill-current text-teal-700 ml-1" @click="toggleTooltip('showWhiteTooltip')">
                    <path d="M10 .4A9.6 9.6 0 0 0 .4 10a9.6 9.6 0 1 0 19.2-.001C19.6 4.698 15.301.4 10 .4zm-.151 15.199h-.051c-.782-.023-1.334-.6-1.311-1.371.022-.758.587-1.309 1.343-1.309l.046.002c.804.023 1.35.594 1.327 1.387-.023.76-.578 1.291-1.354 1.291zm3.291-6.531c-.184.26-.588.586-1.098.983l-.562.387c-.308.24-.494.467-.563.688-.056.174-.082.221-.087.576v.09H8.685l.006-.182c.027-.744.045-1.184.354-1.547.485-.568 1.555-1.258 1.6-1.287a1.65 1.65 0 0 0 .379-.387c.225-.311.324-.555.324-.793 0-.334-.098-.643-.293-.916-.188-.266-.545-.398-1.061-.398-.512 0-.863.162-1.072.496-.216.341-.325.7-.325 1.067v.092H6.386l.004-.096c.057-1.353.541-2.328 1.435-2.897.563-.361 1.264-.544 2.081-.544 1.068 0 1.972.26 2.682.772.721.519 1.086 1.297 1.086 2.311-.001.567-.18 1.1-.534 1.585z"/>
                </svg>
                <tooltip transition="fade" :show="showWhiteTooltip">Равномерность распределения шуток среди участников одной команды</tooltip>
            </div>
            <div class="mt-1">
                Оценка жюри: {{ this.points }} 
                <span class="text-gray-600 text-sm"> / игру </span>
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
    props: ['team', 'selected'],
    computed: {
        efficiency() {
            return (this.team.team_games_average.avg_efficiency * 100).toFixed(1).replace('.', ',');
        }, 

        okg() {
            return (this.team.team_games_average.avg_okg * 1).toFixed(1).replace('.', ',');
        },

        whiteIndex() {
            return (this.team.team_games_average.avg_white_index * 1).toFixed(1).replace('.', ',');
        },

        points() {
            return (this.team.team_games_average.avg_points * 1).toFixed(1).replace('.', ',');
        }
    },

    data() {
        return {
            tooltips: ['showOkgTooltip', 'showWhiteTooltip', 'showEfficiencyTooltip'],
            showOkgTooltip: false,
            showWhiteTooltip: false,
            showEfficiencyTooltip: false
        }
    },

    methods: {
        toggleTooltip(tooltip) {
            if (this[tooltip]  === true) {
                this[tooltip] = false;
            } else {               
                this.tooltips.forEach((tip) => this[tip] = false);
                this[tooltip] = true;
            }
        },

        teamClicked() {
            if (this.selected) {
                this.$emit('deselected', this.team);
            } else {
                this.$emit('selected', this.team);
            }
        }
    }
}
</script>

<style type="text/css">
.position-check {
  top: 3%;
  left: 2%;
}
</style>