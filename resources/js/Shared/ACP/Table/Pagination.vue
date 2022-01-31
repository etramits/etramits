<template>
  <div v-if="links && links.length > 3" class="flex my-6 gap-1 text-sm leading-4">
    <template v-for="link in links" :key="link.label">
      <div
        v-if="link.url === null"
        v-html="link.label"
        class="px-4 py-3 text-zinc-400 border rounded"
      />

      <Link
        v-else
        v-html="link.label"
        class="px-4 py-3 hover:bg-white border rounded"
        :class="{ 'bg-white': link.active }"
        :href="link.url"
      />
    </template>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
};
</script>

<script setup>
  const props = defineProps({
    links: Array,
  });
</script>