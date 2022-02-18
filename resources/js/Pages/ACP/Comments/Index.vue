<template>
  <FlashData />
  

  <h1 class="mb-8 text-3xl font-bold text-zinc-700">Gestió Comentaris</h1>

  <h3 class="my-8 font-medium text-zinc-700 text-2xl">Comentaris pendents de revisar</h3>
  <div class="bg-white rounded-md shadow overflow-x-auto">
    <table class="w-full text-zinc-700 whitespace-nowrap">
      <tr class="text-left font-bold">
        <th class="px-6 pt-5 pb-3">Id</th>
        <th class="px-6 pt-5 pb-3">Usuari</th>
        <th class="px-6 pt-5 pb-3">Tràmit</th>
        <th class="px-6 pt-5 pb-3">Comentari</th>
        <th class="px-6 pt-5 pb-3">Validar</th>
        <th class="px-6 pt-5 pb-3">Esborrar</th>
      </tr>

      <tr v-for="row in commentsNoValidated.data" :key="row.id" class=" hover:bg-zinc-100 focus-within:bg-zinc-100">
        <td class="px-6 py-3 border-t last:w-px">{{row.id}}</td>
        <td class="px-6 py-3 border-t last:w-px">{{row.user.email}}</td>
        <td class="px-6 py-3 border-t last:w-px">{{row.article.title}}</td>
        <td class="px-6 py-3 border-t last:w-px">{{row.content}}</td>
        <td class="px-6 py-3 border-t last:w-px"><a href="/acp/comentaris/${comment.id}/validate"><svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 13L9 17L19 7" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg></a></td>
        <td class="px-6 py-3 border-t last:w-px"><a class="cursor-pointer"  v-on:click="destroy(row.id)"><svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.17218 14.8284L12.0006 12M14.829 9.17157L12.0006 12M12.0006 12L9.17218 9.17157M12.0006 12L14.829 14.8284" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg></a></td>
      </tr>
    </table>

    <Pagination :links="commentsNoValidated.links" />
  </div>


  <h3 class="my-8 font-medium text-zinc-700 text-2xl">Historial Comentaris</h3>
  <div class="bg-white rounded-md shadow overflow-x-auto">
    <table class="w-full text-zinc-700 whitespace-nowrap">
      <tr class="text-left font-bold">
        <th class="px-6 pt-5 pb-3">Id</th>
        <th class="px-6 pt-5 pb-3">Usuari</th>
        <th class="px-6 pt-5 pb-3">Tràmit</th>
        <th class="px-6 pt-5 pb-3">Comentari</th>
        <th class="px-6 pt-5 pb-3">Validar</th>
        <th class="px-6 pt-5 pb-3">Esborrar</th>
      </tr>

      <tr v-for="row in commentsValidated.data" :key="row.id" class=" hover:bg-zinc-100 focus-within:bg-zinc-100">
        <td class="px-6 py-3 border-t last:w-px">{{row.id}}</td>
        <td class="px-6 py-3 border-t last:w-px">{{row.user.email}}</td>
        <td class="px-6 py-3 border-t last:w-px">{{row.article.title}}</td>
        <td class="px-6 py-3 border-t last:w-px">{{row.content}}</td>
        <td class="px-6 py-3 border-t last:w-px"><a href="/acp/comentaris/${comment.id}/validate"><svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 13L9 17L19 7" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg></a></td>
        <td class="px-6 py-3 border-t last:w-px"><a class="cursor-pointer"   v-on:click="destroy(row.id)"><svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.17218 14.8284L12.0006 12M14.829 9.17157L12.0006 12M12.0006 12L9.17218 9.17157M12.0006 12L14.829 14.8284" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg></a></td>
      </tr>
    </table>

    <Pagination :links="commentsValidated.links" />
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

  const headers1 = computed(() => {
    return [
      { label: "Id" },
      { label: "Usuari" },
      { label: "Tràmit" },
      { label: "Comentari"},
      { label: "Validar"},
      { label: "Esborrar"},
    ];
  });

  const headers2 = computed(() => {
    return [
      { label: "Id" },
      { label: "Usuari" },
      { label: "Tràmit" },
      { label: "Comentari"},
      { label: "Esborrar"},
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
          `<a href="/acp/comentaris/${comment.id}/validate"><svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 13L9 17L19 7" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg></a>`,
          `<a class="cursor-pointer"  @click.prevent='alert("yo")'><svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.17218 14.8284L12.0006 12M14.829 9.17157L12.0006 12M12.0006 12L9.17218 9.17157M12.0006 12L14.829 14.8284" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg></a>`,
        ]
      };
    });
  });

  const commentsValidatedRows = computed(() => {
    return props.commentsValidated.data.map(comment => {
      return {
        href: '',
        values: [
          comment.id,
          comment.user.email,
          comment.article.title,
          comment.content,
          `<a class="cursor-pointer" @click="destroy(${comment.id})"><svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.17218 14.8284L12.0006 12M14.829 9.17157L12.0006 12M12.0006 12L9.17218 9.17157M12.0006 12L14.829 14.8284" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg></a>`,
        ]
      };
    });
  });

  const destroy = (id) => {
    Inertia.delete(`/deleteComment/${id}`);
  };

</script>