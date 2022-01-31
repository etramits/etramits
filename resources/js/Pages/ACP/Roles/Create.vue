<template>
  <FormError :errors="form.errors" />

  <h1 class="mb-8 font-bold text-3xl text-zinc-700">
    <Link as="span" href="/acp/roles" class="text-zinc-900 cursor-pointer">Roles</Link> / Crear
  </h1>

  <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
    <form @submit.prevent="store">
      <div class="p-8 -mr-6 flex flex-wrap gap-y-6">
        <div class="pr-6 w-full">
          <FormInput
            v-model="form.label"
            :error="form.errors.label"
            type="text"
            label="Nombre"
            autofocus
          />
        </div>

        <div class="pr-6 w-full">
          <FormInput
            v-model="form.acronym"
            :error="form.errors.acronym"
            type="text"
            label="Acrónimo"
          />
        </div>

        <div class="pr-6 w-full">
          <FormSelect
            v-model="form.visible"
            :error="form.errors.visible"
            label="Visible"
          >
            <option :value="true">Si</option>
            <option :value="false">No</option>
          </FormSelect>
        </div>
      </div>

      <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-end">
        <button class="flex items-center px-6 py-3 rounded bg-zinc-700 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-zinc-800 focus:bg-zinc-900" type="submit">
          Crear Usuario
        </button>
      </div>
    </form>
  </div>
</template>

<script>
// Core
import { Link } from "@inertiajs/inertia-vue3"

// Shared
import Layout from "../../../Shared/Layouts/Admin"
import FormInput from "../../../Shared/ACP/FormInput"
import FormSelect from "../../../Shared/ACP/Form/Select"
import FormError from "../../../Shared/ACP/FormError"

export default {
  components: {
    Link,
    FormInput,
    FormSelect,
    FormError
  },
  layout: Layout,
  remember: "form",
};
</script>

<script setup>
  import { useForm } from "@inertiajs/inertia-vue3";
  import { Inertia } from "@inertiajs/inertia";

  let form = useForm({
    label: "",
    acronym: "",
    visible: false,
  });

  const store = () => {
    Inertia.post("/acp/roles", form);
  };
</script>