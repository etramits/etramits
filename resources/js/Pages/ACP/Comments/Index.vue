<template>
  <FlashData />
  

  <h1 class="mb-8 text-3xl font-bold text-zinc-700">Comentaris</h1>

  <div :v-if="commentsNoValidatedRows.length" class="bg-white rounded-md shadow overflow-x-auto">
    <table class="w-full text-zinc-700 whitespace-nowrap">
      <tr class="text-left font-bold">
        <th
          v-for="item in headers"
          :key="item.label"
          v-bind="{ ...item.attrs }"
          v-text="item.label"
          class="px-6 pt-5 pb-3"
        />
      </tr>

      <tr
        v-for="row in commentsNoValidatedRows"
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
      </tr>
    </table>

    <Pagination :links="pagination" />
  </div>
  
</template>

<script>
  export default {
    layout: Layout,
  };
</script>

<script setup>
  import { ref, watch, computed } from "vue";
  import { Link, useForm} from "@inertiajs/inertia-vue3";
  import { Inertia } from "@inertiajs/inertia";
  import debounce from "lodash/debounce";
  import Pagination from "../../../Shared/ACP/Table/Pagination";
  

  // Components
  import Layout from "../../../Shared/Layouts/Admin";
  import FlashData from "../../../Shared/ACP/FlashData";
  import Table from "../../../Shared/ACP/Table/Index";

  const props = defineProps({
    commentsValidated: Object,
    commentsNoValidated: Object,
  });

  let showFlashData = ref(true);

  const headers = computed(() => {
    return [
      { label: "Id" },
      { label: "Usuari" },
      { label: "Tràmit" },
      { label: "Comentari"},
      { label: "Validat"},
    ];
  });



  const commentsNoValidatedRows = computed(() => {
    return props.commentsNoValidated.data.map(comment => {
      return {
        href: '',
        values: [
          comment.id,
          comment.user.email,
          comment.article.title,
          comment.content,
          comment.active
            ? `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></a>`
            : `<a href="/acp/comentaris/${comment.id}/validate"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><line x1="3" y1="3" x2="21" y2="21" /><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" /><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" />`,
        ]
      };
    });
  });


</script>