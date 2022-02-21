<template>
  <FormError :errors="form.errors" />

  <h1 class="mb-8 font-bold text-3xl text-zinc-700">
    <Link as="span" href="/acp/usuaris" class="text-zinc-900 cursor-pointer">Categories</Link> / Crear
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

        <div class="pr-6 w-1/2 text-zinc-700 inline">
          <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2&s=solid&m=free" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>Llibreria Icones</a>
        </div>

      </div>

      <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-end">
        <button class="flex items-center px-6 py-3 rounded bg-zinc-700 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-zinc-800 focus:bg-zinc-900" type="submit">
          Crear Categoria
        </button>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    layout: Layout,
    remember: "form",
  };
</script>

<script setup>
  // Core
  import { useForm, Link } from "@inertiajs/inertia-vue3";
  import { Inertia } from "@inertiajs/inertia";

  // Components
  import Layout from "../../../Shared/Layouts/Admin";
  import FormInput from "../../../Shared/ACP/FormInput";
  import FormSelect from "../../../Shared/ACP/Form/Select";
  import FormError from "../../../Shared/ACP/FormError";

  const props = defineProps({
    roles: Object,
  });

  let form = useForm({
    name: '',
    slug: '',
    icon: '',
    description: '',
    parent: '',
    active: false,
  });

  const store = () => {
    form.post("/acp/usuaris");
  };
</script>
