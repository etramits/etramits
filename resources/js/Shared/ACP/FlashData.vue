<template>
  <div v-if="$page.props.flash.success && showFlashSuccess" class="mb-8 flex items-center justify-between bg-green-500 rounded max-w-3xl">
    <div class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="ml-4 mr-2 flex-shrink-0 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M5 12l5 5l10 -10"></path>
      </svg>

      <div v-text="$page.props.flash.success" class="py-4 text-white text-sm font-medium" />
    </div>

    <button
      type="button"
      class="group mr-2 p-2"
      @click="hideFlashSuccess"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="235.908" height="235.908" viewBox="278.046 126.846 235.908 235.908" class="block w-2 h-2 fill-green-800 group-hover:fill-white">
        <path d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"></path>
      </svg>
    </button>
  </div>

  <div v-if="$page.props.flash.error && showFlashErrors" class="mb-8 flex items-center justify-between p-4 bg-red-400 rounded max-w-3xl">
    <div class="flex items-center text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M8.7 3h6.6c.3 0 .5 .1 .7 .3l4.7 4.7c.2 .2 .3 .4 .3 .7v6.6c0 .3 -.1 .5 -.3 .7l-4.7 4.7c-.2 .2 -.4 .3 -.7 .3h-6.6c-.3 0 -.5 -.1 -.7 -.3l-4.7 -4.7c-.2 -.2 -.3 -.4 -.3 -.7v-6.6c0 -.3 .1 -.5 .3 -.7l4.7 -4.7c.2 -.2 .4 -.3 .7 -.3z" />
        <line x1="12" y1="8" x2="12" y2="12" />
        <line x1="12" y1="16" x2="12.01" y2="16" />
      </svg>

      <div v-text="$page.props.flash.error" class="text-sm font-medium" />
    </div>

    <button
      type="button"
      class="group"
      @click="hideFlashErrors"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="ml-4 mr-2 flex-shrink-0 text-red-800" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <line x1="18" y1="6" x2="6" y2="18" />
        <line x1="6" y1="6" x2="18" y2="18" />
      </svg>
    </button>
  </div>
</template>

<script setup>
  import { ref } from "vue";

  const showFlashSuccess = ref(true);
  const showFlashErrors = ref(true);
  
  const hideFlashSuccess = () => showFlashSuccess.value = false;
  const hideFlashErrors = () => showFlashErrors.value = false;
</script>