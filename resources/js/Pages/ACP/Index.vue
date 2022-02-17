<template>
  <h1 class="mb-8 text-3xl font-bold text-zinc-700">Inici</h1>

  <div class="grid grid-cols-3 gap-12 content-center justify-center">
    <div v-for="stat in stats1" :key="stat.id" class="bg-white shadow-md px-2 py-8 text-center rounded grid grid-cols-6 content-center justify-center text-zinc-700">
      <div class="grid content-center justify-center md:col-span-2 text-2xl">
        <font-awesome-icon v-bind:icon="stat.icon" size="3x" :class="`text-black-300`" />
      </div>
      <div class="grid content-center md:col-span-2 text-2xl">
        <p>{{stat.label}}</p>
        <p class="font-bold">{{stat.value1}} / {{stat.value2}}</p>
      </div>
      <div class="grid content-center md:col-span-2 text-5xl">
        <p class="font-medium">{{stat.percent}}%</p>
      </div>
    </div>
  </div>

  
  <div class="grid grid-cols-2 gap-12 content-center justify-center" v-if="users.data.length">
    <div class="grid content-center justify-center col-span-1">
      <h3 class="my-8 font-medium text-zinc-700 text-2xl">Usuaris amb permisos</h3>
      <Table :data="adminUsersTableData" :pagination="users.links"/>
    </div>
    <div class="justify-center col-span-1" v-if="users.data.length">
      <h3 class="my-8 font-medium text-zinc-700 text-2xl">Carrega Categories</h3>
      <Table :data="loadCategoriesTableData" :pagination="loadCategories.links"/>
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
import Table from "../../Shared/ACP/Table/IndexNew";
import { ref, watch, computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  stats1: Object,
  users: Object,
  loadCategories: Object
});

/**
 * Computed
**/

/** Obtenir les dades de la categoria pare per la taula */
const adminUsersTableData = computed(() => {
  return {
    header: [
      { label: "Usuari" },
      { label: "Correu electrònic" },
      { label: "Rol" },
      { label: "Verificat", attrs: { colspan: 2 } },
    ],

    rows: props.users.data.map(user => {
      return {
        href: `/acp/usuaris/${user.id}/editar`,
        values: [
          user.name,
          user.email,
          user.role,
          user.email_verified_at
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><line x1="3" y1="3" x2="21" y2="21" /><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" /><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" />',
          '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="block w-6 h-6 fill-gray-400"><polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707" /></svg>',
        ]
      };
    }),
  }
});

const loadCategoriesTableData = computed(() => {
  return {
    header: [
      { label: "Name" },
      { label: "Nº Articles" },
      { label: "Percentatge" },
      { label: "Actiu", attrs: { colspan: 2 } },
    ],

    

    rows: props.loadCategories.map(user => {
      return {
        href: `/acp/usuaris/${user.id}/editar`,
        values: [
          user.name,
          user.numArticles,
          user.percentage + ' %',
          user.active
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><line x1="3" y1="3" x2="21" y2="21" /><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" /><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" />',
          '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="block w-6 h-6 fill-gray-400"><polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707" /></svg>',
        ]
      };
    }),
  }
});



</script>