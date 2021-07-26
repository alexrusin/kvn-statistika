<template>
    <div class="p-4 rounded-lg shadow-lg bg-white flex justify-center">
        <div>
            <h3 class="mb-2 font-semibold">{{teamGame.game.display_name}}</h3>
            <p>ОКГ: {{teamGame.okg | toOneDecimalPlace }}</p>
            <p>Эффективность: {{teamGame.efficiency * 100 | toOneDecimalPlace}}%</p>
            <p>Индекс Белого: {{teamGame.white_index | toOneDecimalPlace}}</p>
            <p>Балл жюри: {{teamGame.points | toOneDecimalPlace}}</p>
            <p>Время в игре: {{teamGame.time / 60 | toOneDecimalPlace}} мин.</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['teamGame'],
    filters: {
        toOneDecimalPlace(value) {
            if (!value) {
                return 'N/A';
            }
            return parseFloat(value).toFixed(1).replace(".", ",");
        }
    }
}
</script>
