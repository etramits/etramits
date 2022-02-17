<template>
  <div class="bg-white rounded-md shadow overflow-x-auto">
    <table class="w-full text-zinc-700 whitespace-nowrap">
      <tr class="text-left font-bold">
        <th
          v-for="item in header"
          :key="item.label"
          v-bind="{ ...item.attrs }"
          v-text="item.label"
          class="px-6 pt-5 pb-3"
        />
      </tr>

      <Link
        v-for="row in rows"
        :key="row"
        as="tr"
        class=" hover:bg-zinc-100 focus-within:bg-zinc-100"
      >
        <td
          v-for="record in row.values"
          :key="record"
          v-html="record"
          class="px-6 py-3 border-t last:w-px"
        />
      </Link>
    </table>
  </div>

  <Pagination :links="pagination" />
</template>

<script>
// Core
import { Link } from "@inertiajs/inertia-vue3";

// Shared
import Pagination from "./Pagination"

export default {
  components: {
    Link,
    Pagination
  },
};

</script>

<script setup>
  const props = defineProps({
    header: Array,
    rows: Array,
    pagination: Array,
  });
</script>