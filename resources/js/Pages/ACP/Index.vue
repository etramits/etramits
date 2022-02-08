<template>
  <h1 class="mb-8 font-bold text-3xl">Inici</h1>

  <div class="grid grid-cols-3 gap-4 content-center justify-center">
    <div v-for="stat in stats1" :key="stat.id" class="bg-white shadow-md px-2 py-8 text-center rounded grid grid-cols-6 content-center justify-center text-zinc-700">
      <div class="grid content-center justify-center md:col-span-2 text-2xl">
        <font-awesome-icon v-bind:icon="stat.icon" size="3x" :class="`text-black-300`" />
      </div>
      <div class="grid content-center md:col-span-2 text-2xl">
        <p>{{stat.label}}</p>
        <p class="font-bold">{{stat.value1}} / {{stat.value2}}</p>
      </div>
      <div class="grid content-center md:col-span-2 text-5xl">
        <p class="font-medium">{{stat.value1 * 100 / stat.value2}}%</p>
      </div>
    </div>
  </div>
</template>

<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'

library.add(fas)

export default {
  layout: Layout,
  FontAwesomeIcon
};
</script>

<script setup>
// Components
import Layout from "../../Shared/Layouts/Admin";
import Circle from "../../Shared/ACP/Chart/Circle.vue";

const props = defineProps({
    stats1: Object
  });
</script>