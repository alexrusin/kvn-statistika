<template>
  <div v-if="noData" class="w-full lg:w-1/2 px-4 mb-4">
    <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full">
      <div class="border-b">
        <div class="flex justify-between px-6 -mb-px">
          <h3 class="py-4 text-xl font-semibold">{{ cardTitle }}</h3>
        </div>
      </div>
      <div>
        <div class="text-center px-6 py-4">
          <div class="py-8">
            <div class="mb-4">
              <svg
                class="inline-block fill-current text-grey h-16 w-16"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M11.933 13.069s7.059-5.094 6.276-10.924a.465.465 0 0 0-.112-.268.436.436 0 0 0-.263-.115C12.137.961 7.16 8.184 7.16 8.184c-4.318-.517-4.004.344-5.974 5.076-.377.902.234 1.213.904.959l2.148-.811 2.59 2.648-.793 2.199c-.248.686.055 1.311.938.926 4.624-2.016 5.466-1.694 4.96-6.112zm1.009-5.916a1.594 1.594 0 0 1 0-2.217 1.509 1.509 0 0 1 2.166 0 1.594 1.594 0 0 1 0 2.217 1.509 1.509 0 0 1-2.166 0z"
                />
              </svg>
            </div>
            <p class="text-2xl text-grey-darker font-medium mb-4">Нет Данных</p>
            <div>
              <button type="button" class="btn btn-blue">Ввести Данные</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div v-else class="w-full lg:w-1/2 px-4 mb-4">
    <div
      class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden min-h-full"
    >
      <div class="border-b">
        <div class="flex justify-between px-6 -mb-px">
          <h3 class="py-4 text-xl font-semibold">{{ cardTitle }}</h3>
          <div class="flex">
            <a
              href="#"
              class="appearance-none py-4 border-b border-blue-dark mr-3 text-blue-500 text-xl hover:underline"
            >Ввести данные</a>
          </div>
        </div>
      </div>
      <div v-for="entry in data" 
      :key="entry.id"
      v-html="entry.display_name"
      class="flex-grow flex px-6 items-center border-b text-xl truncate py-3">
      </div>
    </div>
  </div>
</template>


<script>
export default {
  props: ["data", "cardTitle"],
  computed: {
    noData() {
      return !this.data.length
    }
  },
  data() {
    return {

    };
  }
};
</script>