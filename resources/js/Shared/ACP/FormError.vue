<template>
  <div v-if="Object.keys(errors).length && showFlashData" class="mb-8 flex items-center justify-between p-4 bg-red-400 rounded max-w-3xl">
    <div class="flex items-center text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M8.7 3h6.6c.3 0 .5 .1 .7 .3l4.7 4.7c.2 .2 .3 .4 .3 .7v6.6c0 .3 -.1 .5 -.3 .7l-4.7 4.7c-.2 .2 -.4 .3 -.7 .3h-6.6c-.3 0 -.5 -.1 -.7 -.3l-4.7 -4.7c-.2 -.2 -.3 -.4 -.3 -.7v-6.6c0 -.3 .1 -.5 .3 -.7l4.7 -4.7c.2 -.2 .4 -.3 .7 -.3z" />
        <line x1="12" y1="8" x2="12" y2="12" />
        <line x1="12" y1="16" x2="12.01" y2="16" />
      </svg>

      <div class="text-sm font-medium">
        Hi ha errors en el formulari
      </div>
    </div>

    <button type="button" class="group" @click="hideFlashData">
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

  const props = defineProps({
    errors: Object,
  });

  const showFlashData = ref(true);
  
  const hideFlashData = () => showFlashData.value = false;
</script>