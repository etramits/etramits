<template>
  <FlashData />

  <h1 class="mb-8 font-bold text-3xl text-zinc-700">
    <Link as="span" href="/acp/categories" class="text-zinc-900 cursor-pointer">Categories</Link> / {{ category.name }}
  </h1>

  <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
    <form @submit.prevent="update">
      <div class="p-8 -mr-6 flex flex-wrap gap-y-6">
        <div class="pr-6 w-full">
          <FormInput
            v-model="form.name"
            :error="form.errors.name"
            type="text"
            label="Nom"
          />
        </div>

        <div class="pr-6 w-2/3">
          <FormInput
            v-model="form.slug"
            :error="form.errors.slug"
            type="text"
            label="Enllaç"
          />
        </div>

        <div class="pr-6 w-1/3">
          <FormInput
            v-model="form.icon"
            :error="form.errors.icon"
            type="text"
            label="Icona"
          />
        </div>

        <div class="pr-6 w-full">
          <FormTextArea
            v-model="form.description"
            :error="form.errors.description"
            rows="2"
            label="Descripció"
          />
        </div>

        <div class="pr-6 w-1/2">
          <FormSelect
            v-model="form.parent"
            :error="form.errors.parent"
            label="Categoria pare"
          >
            <option value="">-</option>
            <option
              v-for="category in categories"
              :key="category.id"
              :value="category.id"
              v-text="category.name"
            />
          </FormSelect>
        </div>

        <div class="pr-6 w-1/2">
          <FormSelect
            v-model="form.active"
            :error="form.errors.active"
            label="Actiu"
          >
            <option :value="true">Si</option>
            <option :value="false">No</option>
          </FormSelect>
        </div>
      </div>

      <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
        <button tabindex="-1" type="button" class="text-red-600 hover:underline" @click="destroy">Eliminar Categoria</button>

        <button class="flex items-center px-6 py-3 rounded bg-zinc-700 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-zinc-800 focus:bg-zinc-900" type="submit">
          Actualitzar Categoria
        </button>
      </div>
    </form>
  </div>

  <template v-if="parent.length">
    <h2 class="mt-12 mb-6 text-2xl font-bold text-zinc-700">Categoria pare</h2>

    <Table :data="parentCategoryTableData" />
  </template>

  <template v-if="subcategories.data.length">
    <h2 class="mt-12 mb-6 text-2xl font-bold text-zinc-700">Subcategories</h2>

    <Table
      :data="subcategoriesTableData"
      :pagination="subcategories.links"
    />
  </template>
</template>

<script>
export default {
  layout: Layout,
};
</script>

<script setup>
import { computed } from "vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

/**
 * Components
**/

import Layout from "../../../Shared/Layouts/Admin";
import FlashData from "../../../Shared/ACP/FlashData";
import FormInput from "../../../Shared/ACP/FormInput";
import FormTextArea from "../../../Shared/ACP/Form/TextArea";
import FormSelect from "../../../Shared/ACP/Form/Select";
import Table from "../../../Shared/ACP/Table/IndexNew";

/**
 * Props
**/

const props = defineProps({
  category: Object,
  parent: Object,
  subcategories: Array,
  categories: Array,
});

/**
 * Forms
**/

let form = useForm({
  name: props.category.name,
  slug: props.category.slug,
  icon: props.category.icon,
  description: props.category.description,
  parent: props.category.parent,
  user_id: props.category.user_id,
  active: Boolean(props.category.active),
});

/**
 * Methods
**/

/** Mètode per actualitzar la informació d'una categoria. */
const update = () => {
  form.put(`/acp/categories/${props.category.id}`, {
    preserveScroll: true,
  });
};

/** Mètode per esborrar una categoria. */
const destroy = () => {
  if (confirm("Estàs segur que vols eliminar aquesta categoria?")) {
    Inertia.delete(`/acp/categories/${props.category.id}`);
  }
};

/**
 * Computed
**/

/** Obtenir les dades de la categoria pare per la taula */
const parentCategoryTableData = computed(() => {
  return {
    header: [
      { label: "Id" },
      { label: "Nom" },
      { label: "Enllaç" },
      { label: "Icona" },
      { label: "Actiu", attrs: { colspan: 2 } },
    ],

    rows: props.parent.map(row => {
      return {
        href: `/acp/categories/${row.id}/editar`,
        values: [
          row.id,
          row.name,
          row.slug,
          row.icon,
          row.active
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><line x1="3" y1="3" x2="21" y2="21" /><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" /><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" />',
          '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="block w-6 h-6 fill-gray-400"><polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707" />',
        ],
      };
    }),
  }
});

/** Obtenir les dades de les subcategories per la taula */
const subcategoriesTableData = computed(() => {
  return {
    header: [
      { label: "Id" },
      { label: "Nom" },
      { label: "Enllaç" },
      { label: "Icona" },
      { label: "Actiu", attrs: { colspan: 2 } },
    ],

    rows: props.subcategories.data.map(subcategory => {
      return {
        href: `/acp/categories/${subcategory.id}/editar`,
        values: [
          subcategory.id,
          subcategory.name,
          subcategory.slug,
          subcategory.icon,
          subcategory.active
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><line x1="3" y1="3" x2="21" y2="21" /><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" /><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" />',
          '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="block w-6 h-6 fill-gray-400"><polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707" />',
        ],
      };
    }),
  }
});
</script>