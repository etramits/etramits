<template>
  <FlashData />

  <h1 class="mb-8 text-3xl font-bold text-zinc-700">Licencias</h1>

  <div class="mb-6 flex justify-between items-center">
    <input
      v-model="search"
      autocomplete="off"
      type="text"
      name="search"
      placeholder="Buscar…"
      class="relative w-1/5 px-6 py-3 rounded shadow text-zinc-700 focus:outline-none focus:ring focus:ring-zinc-700/20 focus:border-zinc-900"
    >

    <Link href="/acp/licencias/crear" class="px-6 py-3 text-sm font-bold text-white leading-4 rounded shadow bg-zinc-700 whitespace-nowrap hover:bg-zinc-800 focus:outline-none focus:ring focus:ring-zinc-700/20">
      <span>Crear</span> <span class="hidden md:inline">Licencia</span>
    </Link>
  </div>

  <Table
    :header="getLicensesHeaders"
    :rows="getLicensesRows"
    :pagination="licenses.links"
  />
</template>

<script>
// Core
import { Link } from "@inertiajs/inertia-vue3"

// Shared
import Layout from "../../../Shared/Layouts/Admin";
import FlashData from "../../../Shared/ACP/FlashData";
import Table from "../../../Shared/ACP/Table/Index";

export default {
  components: {
    Link,
    FlashData,
    Table,
  },
  layout: Layout,
};
</script>

<script setup>
  import { ref, watch, computed } from "vue";
  import { Inertia } from "@inertiajs/inertia";
  import debounce from "lodash/debounce";

  const props = defineProps({
    licenses: Object,
    filters: Object,
  });

  let showFlashData = ref(true);

  const getLicensesHeaders = computed(() => {
    return [
      { label: 'Id' },
      { label: 'Nombre' },
      { label: 'Enlace' },
      { label: 'Visible', attrs: { colspan: 2 } },
    ];
  });

  const getLicensesRows = computed(() => {
    return props.licenses.data.map(license => {
      return {
        href: `/acp/licencias/${license.id}/editar`,
        values: [
          license.id,
          license.label,
          `/${license.slug}`,
          license.visible
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><line x1="3" y1="3" x2="21" y2="21" /><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" /><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" />',
          '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="block w-6 h-6 fill-gray-400"><polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707" />'
        ]
      };
    });
  });

  let search = ref(props.filters.search);

  watch(search, debounce(function (value) {
    Inertia.get("/acp/licencias", { search: value }, {
      preserveState: true,
      replace: true,
    });
  }, 500));
</script>
