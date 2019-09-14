<template>
  <div v-if="show" class="w-full lg:w-1/2 px-4 mb-4">
    <div class="bg-white border-t border-b sm:rounded sm:border shadow min-h-full">
      <div class="border-b">
        <div class="flex justify-between px-6 -mb-px">
          <h3 class="text-blue-dark py-4 font-normal text-lg">Игры</h3>
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
            <p class="text-2xl text-grey-darker font-medium mb-4">Нет Игр</p>
            <div>
              <button type="button" class="btn btn-blue">Ввести Игры</button>
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
          <h3 class="text-blue-dark py-4 font-normal text-lg">Игры</h3>
          <div class="flex">
            <a
              href="#"
              class="appearance-none py-4 text-blue-dark border-b border-blue-dark mr-3 text-blue-500 font-semibold hover:underline"
            >Ввести игры</a>
          </div>
        </div>
      </div>
      <div class="flex-grow flex px-6 py-6 text-grey-darker items-center border-b -mx-4">
        <div class="w-2/5 xl:w-1/4 px-4 flex items-center">
          <div class="rounded-full bg-grey inline-flex mr-3">
            <svg
              class="fill-current text-white h-8 w-8 block"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 38 38"
            >
              <g fill-rule="evenodd">
                <path
                  d="M12.29 28.04l1.29-5.52-1.58.67.63-2.85 1.64-.68L16.52 10h5.23l-1.52 7.14 2.09-.74-.58 2.7-2.05.8-.9 4.34h8.1l-.99 3.8z"
                />
              </g>
            </svg>
          </div>
          <span class="text-lg">Litecoin</span>
        </div>
        <div class="hidden md:flex lg:hidden xl:flex w-1/4 px-4 items-center">
          <div class="bg-grey h-2 w-2 rounded-full mr-2"></div>0%
        </div>
        <div class="flex w-3/5 md:w/12">
          <div class="w-1/2 px-4">
            <div class="text-right">0.0000 LTC</div>
          </div>
          <div class="w-1/2 px-4">
            <div class="text-right text-grey">CA$0.00</div>
          </div>
        </div>
      </div>
      <div class="flex-grow flex px-6 py-6 text-grey-darker items-center border-b -mx-4">
        <div class="w-2/5 xl:w-1/4 px-4 flex items-center">
          <div class="rounded-full bg-indigo inline-flex mr-3">
            <svg
              class="fill-current text-white h-8 w-8 block"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 32 32"
            >
              <g fill-rule="evenodd">
                <path
                  d="M10.13 17.76c-.1-.15-.06-.2.09-.12l5.49 3.09c.15.08.4.08.56 0l5.58-3.08c.16-.08.2-.03.1.11L16.2 25.9c-.1.15-.28.15-.38 0l-5.7-8.13zm.04-2.03a.3.3 0 0 1-.13-.42l5.74-9.2c.1-.15.25-.15.34 0l5.77 9.19c.1.14.05.33-.12.41l-5.5 2.78a.73.73 0 0 1-.6 0l-5.5-2.76z"
                />
              </g>
            </svg>
          </div>
          <span class="text-lg">Ethereum</span>
        </div>
        <div class="hidden md:flex lg:hidden xl:flex w-1/4 px-4 items-center">
          <div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>0%
        </div>
        <div class="flex w-3/5 md:w/12">
          <div class="w-1/2 px-4">
            <div class="text-right">0.0000 ETH</div>
          </div>
          <div class="w-1/2 px-4">
            <div class="text-right text-grey">CA$0.00</div>
          </div>
        </div>
      </div>
      <div class="flex-grow flex px-6 py-6 text-grey-darker items-center border-b -mx-4">
        <div class="w-2/5 xl:w-1/4 px-4 flex items-center">
          <div class="rounded-full bg-indigo inline-flex mr-3">
            <svg
              class="fill-current text-white h-8 w-8 block"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 32 32"
            >
              <g fill-rule="evenodd">
                <path
                  d="M10.13 17.76c-.1-.15-.06-.2.09-.12l5.49 3.09c.15.08.4.08.56 0l5.58-3.08c.16-.08.2-.03.1.11L16.2 25.9c-.1.15-.28.15-.38 0l-5.7-8.13zm.04-2.03a.3.3 0 0 1-.13-.42l5.74-9.2c.1-.15.25-.15.34 0l5.77 9.19c.1.14.05.33-.12.41l-5.5 2.78a.73.73 0 0 1-.6 0l-5.5-2.76z"
                />
              </g>
            </svg>
          </div>
          <span class="text-lg">Ethereum</span>
        </div>
        <div class="hidden md:flex lg:hidden xl:flex w-1/4 px-4 items-center">
          <div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>0%
        </div>
        <div class="flex w-3/5 md:w/12">
          <div class="w-1/2 px-4">
            <div class="text-right">0.0000 ETH</div>
          </div>
          <div class="w-1/2 px-4">
            <div class="text-right text-grey">CA$0.00</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  props: ["games"],
  data() {
    return {
      show: false
    };
  }
};
</script>