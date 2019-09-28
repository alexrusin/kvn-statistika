<template>
    <transition :name="transition">
      <div v-show="show" class="absolute bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md z-10" style="height: auto; min-height: 200%; top: 105%; left: 0%; min-width:220px;" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current w-3 text-teal mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="text-xs"><slot></slot></p>
          </div>
        </div>
      </div>
    </transition>
</template>

<script>
export default {
    props: {
    show: {
      type: Boolean,
      required: true
    },
    transition: {
      type: String,
      default: 'bounce',
      required: true 
    }
  }
}
</script>

<style type="text/css">
.fade-enter-active {
  transition: opacity 0.3s
}

.fade-leave-active {
  transition: opacity 0.5s
}
.fade-enter, .fade-leave-to  {
  opacity: 0
}

.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}
</style>