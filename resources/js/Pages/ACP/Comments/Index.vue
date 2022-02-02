<template>
  <FlashData />

  <h1 class="mb-8 text-3xl font-bold text-zinc-700">Comentaris</h1>

  <div class="mb-6 flex justify-between items-center">
    <input
      v-model="search"
      autocomplete="off"
      type="text"
      name="search"
      placeholder="Cercar..."
      class="relative w-1/5 px-6 py-3 rounded shadow text-zinc-700 focus:outline-none focus:ring focus:ring-zinc-700/20 focus:border-zinc-900"
    >

    <Link href="/acp/comentaris/crear" class="px-6 py-3 text-sm font-bold text-white leading-4 rounded shadow bg-zinc-700 whitespace-nowrap hover:bg-zinc-800 focus:outline-none focus:ring focus:ring-zinc-700/20">
      <span>Crear</span> <span class="hidden md:inline">Comentari</span>
    </Link>
  </div>

  <Table
    :header="getCommentsHeaders"
    :rows="getCommentsRows"
    :pagination="comments.links"
  />
</template>

<script>
  export default {
    layout: Layout,
  };
</script>

<script setup>
  import { ref, watch, computed } from "vue";
  import { Link } from "@inertiajs/inertia-vue3";
  import { Inertia } from "@inertiajs/inertia";
  import debounce from "lodash/debounce";

  // Components
  import Layout from "../../../Shared/Layouts/Admin";
  import FlashData from "../../../Shared/ACP/FlashData";
  import Table from "../../../Shared/ACP/Table/Index";

  const props = defineProps({
    comments: Object,
    filters: Object,
  });

  let showFlashData = ref(true);

  const getCommentsHeaders = computed(() => {
    return [
      { label: "Id" },
      { label: "Comentari" },
      { label: "Validat" },
      { label: "Usuari" },
    ];
  });

  const getCommentsRows = computed(() => {
    return props.comments.data.map(comment => {
      return {
        href: `/acp/comentaris/${comment.id}/editar`,
        values: [
          comment.id,
          comment.content,
          comment.active,
          comment.user.name
        ]
      };
    });
  });

  let search = ref(props.filters.search);

  watch(search, debounce(function (value) {
    Inertia.get("/acp/comentaris", { search: value }, {
      preserveState: true,
      replace: true,
    });
  }, 500));
</script>